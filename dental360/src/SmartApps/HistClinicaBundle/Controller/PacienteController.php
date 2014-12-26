<?php

namespace SmartApps\HistClinicaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SmartApps\HistClinicaBundle\Entity\Paciente;
use SmartApps\HistClinicaBundle\Entity\HistoriaClinica;
use SmartApps\HistClinicaBundle\Form\PacienteType;
use Symfony\Component\HttpFoundation\Response;

/**
 * Paciente controller.
 *
 */
class PacienteController extends Controller {

    /**
     * Lists all Paciente entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        // $entities = $em->getRepository('HistClinicaBundle:Paciente')->findAll();
        $paginador = $this->get('ideup.simple_paginator');
        $entities = $paginador->paginate(
                        $em->getRepository("HistClinicaBundle:Paciente")->queryTodosLosPacientes()
                )->getResult();
        return $this->render('HistClinicaBundle:Paciente:index.html.twig', array(
                    'entities' => $entities,
                    'tipoIdentificacion' => \SmartApps\HistClinicaBundle\Util\Util::TipoIdentificacionEnum(),
                    'estadoCivil' => \SmartApps\HistClinicaBundle\Util\Util::EstadoCivilEnum(),
                    'genero' => \SmartApps\HistClinicaBundle\Util\Util::GeneroEnum(),
        ));
    }

    public function searchAction() {
        $search=filter_input(INPUT_POST, 'search',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $em = $this->getDoctrine()->getManager();
        $paginador = $this->get('ideup.simple_paginator');
        $paginador->paginate($em->getRepository("HistClinicaBundle:Paciente")->queryBuscarPacientes($search));
        if ($paginador->getTotalItems() > 0) {
            $paginador->setItemsPerPage($paginador->getTotalItems());
        }
        $entities = $paginador->paginate(
                        $em->getRepository("HistClinicaBundle:Paciente")->queryBuscarPacientes($search)
                )->getResult();
        return $this->render('HistClinicaBundle:Paciente:index.html.twig', array(
                    'entities' => $entities,
                    'search' => $search,
                    'tipoIdentificacion' => \SmartApps\HistClinicaBundle\Util\Util::TipoIdentificacionEnum(),
                    'estadoCivil' => \SmartApps\HistClinicaBundle\Util\Util::EstadoCivilEnum(),
                    'genero' => \SmartApps\HistClinicaBundle\Util\Util::GeneroEnum(),
        ));
    }

    /**
     * Creates a new Paciente entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Paciente();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);

            $historia = new HistoriaClinica();
            $historia->setPaciente($entity);
            $em->persist($historia);

            $em->flush();

            return $this->redirect($this->generateUrl('paciente', array('id' => $entity->getId())));
        }

        return $this->render('HistClinicaBundle:Paciente:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Paciente entity.
     *
     * @param Paciente $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Paciente $entity) {
        $form = $this->createForm(new PacienteType(), $entity, array(
            'action' => $this->generateUrl('paciente_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Paciente entity.
     *
     */
    public function newAction() {
        $entity = new Paciente();
        $form = $this->createCreateForm($entity);

        return $this->render('HistClinicaBundle:Paciente:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Paciente entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:Paciente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paciente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistClinicaBundle:Paciente:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Paciente entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:Paciente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paciente entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistClinicaBundle:Paciente:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Paciente entity.
     *
     * @param Paciente $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Paciente $entity) {
        $form = $this->createForm(new PacienteType(), $entity, array(
            'action' => $this->generateUrl('paciente_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Paciente entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:Paciente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paciente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('paciente', array('id' => $id)));
        } else {
            echo 'Formulario Invalido';
        }

        return $this->render('HistClinicaBundle:Paciente:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Paciente entity.
     *
     */
    public function deleteAction($id) {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('HistClinicaBundle:Paciente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paciente entity.');
        }

        $em->remove($entity);
        $em->flush();


        return $this->redirect($this->generateUrl('paciente'));
    }

    /**
     * Creates a form to delete a Paciente entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('paciente_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

    public function registroRapidoAction() {
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $nombres = $_POST['nombres'];
        $telefonos = $_POST['telefonos'];
        $tipoId = $_POST['tipoId'];
        $noId = $_POST['noId'];
        $eps = $_POST['eps'];
        $convenio = $_POST['convenio'];

        $em = $this->getDoctrine()->getManager();
        $entity = new Paciente();

        $entity->setApellido1($apellido1);
        $entity->setApellido2($apellido2);
        $entity->setNombres($nombres);
        $entity->setResidenciaTelefono($telefonos);
        $entity->setTipoIdentificacion($tipoId);
        $entity->setNoIdentificacion($noId);
        $entity->setEPS($eps);

        if ($convenio > 0) {
            $entity->setConvenio($em->getRepository('HistClinicaBundle:Convenio')->find($convenio));
        }
        $em->persist($entity);
        $em->flush();

        $response = array(
            "sucess" => "ok",
            "idpaciente" => $entity->getId(),
        );

        return new Response(json_encode($response));
    }

}
