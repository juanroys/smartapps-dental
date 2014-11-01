<?php

namespace SmartApps\HistClinicaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SmartApps\HistClinicaBundle\Entity\Pregunta;
use SmartApps\HistClinicaBundle\Form\PreguntaType;
use SmartApps\HistClinicaBundle\Entity\PreguntaOpcion;

/**
 * Pregunta controller.
 *
 */
class PreguntaController extends Controller {

    /**
     * Lists all Pregunta entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $paginador = $this->get('ideup.simple_paginator');
        $entities = $paginador->paginate(
                        $em->getRepository("HistClinicaBundle:Pregunta")->queryTodasLasPreguntas()
                )->getResult();
        return $this->render('HistClinicaBundle:Pregunta:index.html.twig', array(
                    'entities' => $entities,
                    'sinoenum' => \SmartApps\HistClinicaBundle\Util\Util::SiNoEnum(),
                    'tipoentrada' => \SmartApps\HistClinicaBundle\Util\Util::TipoPreguntaEnum(),
        ));
    }

    /**
     * Creates a new Pregunta entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Pregunta();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            //si es un tipo odontograma
            if ($entity->getTipoEntrada() == 8) {
                $odontograma = $em->getRepository('HistClinicaBundle:Odontograma')->findBy(array('grupo' => $entity->getGrupo()));
                //si no existe algun odontograma en ese grupo entonces se crean sus items y el odontograma
                if ($odontograma == null || !$odontograma) {
                    $this->crearOdontograma($entity->getGrupo(),$em);
                }
            }
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pregunta', array('id' => $entity->getId())));
        }

        return $this->render('HistClinicaBundle:Pregunta:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    private function crearOdontograma($grupo,$em) {    
        $odontograma=new \SmartApps\HistClinicaBundle\Entity\Odontograma();
        $odontograma->setGrupo($grupo);
        $odontograma->setDescripcion($grupo->getTitulo());
        $em->persist($odontograma);
        for ($i = 1; $i <= 4; $i++) {
            if ($i <= 2) {
                for ($k = 1; $k <= 2; $k++)
                    for ($j = 1; $j <= 8; $j++) {
                        $item = new \SmartApps\HistClinicaBundle\Entity\ItemOdontograma();
                        $item->setNoFila($i);
                        $item->setNoCuadrante($k);
                        $item->setNoDiente($j);
                        $item->setOdontograma($odontograma);
                        $em->persist($item);
                    }
            } else {
                for ($k = 3; $k <= 4; $k++)
                    for ($j = 1; $j <= 8; $j++) {
                        $item = new \SmartApps\HistClinicaBundle\Entity\ItemOdontograma();
                        $item->setNoFila($i);
                        $item->setNoCuadrante($k);
                        $item->setNoDiente($j);
                        $item->setOdontograma($odontograma);
                        $em->persist($item);
                    }
            }
        }        
    }

    /**
     * Creates a form to create a Pregunta entity.
     *
     * @param Pregunta $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Pregunta $entity) {
        $form = $this->createForm(new PreguntaType(), $entity, array(
            'action' => $this->generateUrl('pregunta_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Pregunta entity.
     *
     */
    public function newAction() {
        $entity = new Pregunta();
        $form = $this->createCreateForm($entity);

        return $this->render('HistClinicaBundle:Pregunta:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Pregunta entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:Pregunta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pregunta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistClinicaBundle:Pregunta:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Pregunta entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:Pregunta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pregunta entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistClinicaBundle:Pregunta:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Pregunta entity.
     *
     * @param Pregunta $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Pregunta $entity) {
        $form = $this->createForm(new PreguntaType(), $entity, array(
            'action' => $this->generateUrl('pregunta_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Pregunta entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:Pregunta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pregunta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pregunta', array('id' => $id)));
        }

        return $this->render('HistClinicaBundle:Pregunta:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Pregunta entity.
     *
     */
    public function deleteAction(Request $request, $id) {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('HistClinicaBundle:Pregunta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pregunta entity.');
        }

        $em->remove($entity);
        $em->flush();


        return $this->redirect($this->generateUrl('pregunta'));
    }

    /**
     * Creates a form to delete a Pregunta entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('pregunta_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

    public function createfromtemplateAction() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository("HistClinicaBundle:TipoPregunta")->findAll();

        return $this->render('HistClinicaBundle:Pregunta:newfromtemplate.html.twig', array(
                    'entities' => $entities,
        ));
    }

    public function savefromtemplateAction() {
        $templateId = $_POST['templateId'];
        $enunciado = $_POST['enunciado'];

        $em = $this->getDoctrine()->getManager();
        $template = $em->getRepository("HistClinicaBundle:TipoPregunta")->find($templateId);

        // Se crea la nueva pregunta
        $entity = new Pregunta();
        $entity->setEnunciado($enunciado);
        $entity->setTipoEntrada($template->getTipoEntrada());
        $entity->setObligatoria(false);
        $entity->setOrden(1);
        $entity->setColspan(1);
        $entity->setRowspan(1);
        $entity->setNoColumna(1);
        $entity->setEstaActiva(true);
        $em->persist($entity);

        foreach ($template->getOpcionesRespuesta() as $opcionitem) {
            $opcion = new PreguntaOpcion();
            $opcion->setPregunta($entity);
            $opcion->setOrden($opcionitem->getOrden());
            $opcion->setValorTexto($opcionitem->getValorTexto());
            $opcion->setValorNumero($opcionitem->getValorNumero());
            $opcion->setOpciones($opcionitem->getOpciones());
            $opcion->setEnunciado($opcionitem->getEnunciado());
            $em->persist($opcion);
        }

        $em->flush();
        // fin creacion nueva pregunta       


        return $this->redirect($this->generateUrl('pregunta'));
    }

}
