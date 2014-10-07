<?php

namespace SmartApps\AgendaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SmartApps\AgendaBundle\Entity\TarifaMedicoProc;
use SmartApps\AgendaBundle\Form\TarifaMedicoProcType;

/**
 * TarifaMedicoProc controller.
 *
 */
class TarifaMedicoProcController extends Controller
{

    /**
     * Lists all TarifaMedicoProc entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AgendaBundle:TarifaMedicoProc')->findAll();

        return $this->render('AgendaBundle:TarifaMedicoProc:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Lists all TarifaMedicoProc entities.
     *
     */
    public function listadoAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AgendaBundle:TarifaMedicoProc')->queryTarifasPorMedico($id);
        $procedimientos = $em->getRepository("HistClinicaBundle:Procedimiento")->findAll();        
        return $this->render('AgendaBundle:TarifaMedicoProc:listado.html.twig', array(
            'entities' => $entities,
            'procedimientos' => $procedimientos,
            'medicoId' => $id,
        ));
    }
    
    public function guardarAction(){
        $em = $this->getDoctrine()->getManager();        
        $medicoId = $_POST["medicoId"];
        
        $medico = $em->getRepository('AgendaBundle:Medico')->find($medicoId);
        $tarifas = $em->getRepository('AgendaBundle:TarifaMedicoProc')->queryTarifasPorMedico($medicoId);
        foreach($tarifas as $tarifa)
        {
            $em->remove($tarifa);
        }
        $em->flush(); 
        
        $procedimientos = $em->getRepository("HistClinicaBundle:Procedimiento")->findAll();        
        foreach($procedimientos as $procedim)
        {
            if (!empty($_POST["txtValor" . $procedim->getId() ])) {
                $tipo = $_POST["selTipoTarifa" . $procedim->getId() ];
                $valor = $_POST["txtValor" . $procedim->getId() ];                                
                
                $tarifa = new \SmartApps\AgendaBundle\Entity\TarifaMedicoProc();
                $tarifa->setMedico($medico);
                $tarifa->setProcedimiento($procedim);    
                
                $tarifa->setTipoTarifa($tipo);
                $tarifa->setValor($valor);
                $em->persist($tarifa);
            }
        }
        $em->flush();
        return $this->redirect($this->generateUrl('tarifamedicoproc_listado', array('id' => $medicoId)));
    }
    
    /**
     * Creates a new TarifaMedicoProc entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TarifaMedicoProc();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tarifamedicoproc_show', array('id' => $entity->getId())));
        }

        return $this->render('AgendaBundle:TarifaMedicoProc:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a TarifaMedicoProc entity.
     *
     * @param TarifaMedicoProc $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TarifaMedicoProc $entity)
    {
        $form = $this->createForm(new TarifaMedicoProcType(), $entity, array(
            'action' => $this->generateUrl('tarifamedicoproc_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TarifaMedicoProc entity.
     *
     */
    public function newAction()
    {
        $entity = new TarifaMedicoProc();
        $form   = $this->createCreateForm($entity);

        return $this->render('AgendaBundle:TarifaMedicoProc:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TarifaMedicoProc entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AgendaBundle:TarifaMedicoProc')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TarifaMedicoProc entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AgendaBundle:TarifaMedicoProc:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TarifaMedicoProc entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AgendaBundle:TarifaMedicoProc')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TarifaMedicoProc entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AgendaBundle:TarifaMedicoProc:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TarifaMedicoProc entity.
    *
    * @param TarifaMedicoProc $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TarifaMedicoProc $entity)
    {
        $form = $this->createForm(new TarifaMedicoProcType(), $entity, array(
            'action' => $this->generateUrl('tarifamedicoproc_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TarifaMedicoProc entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AgendaBundle:TarifaMedicoProc')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TarifaMedicoProc entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tarifamedicoproc_edit', array('id' => $id)));
        }

        return $this->render('AgendaBundle:TarifaMedicoProc:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TarifaMedicoProc entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AgendaBundle:TarifaMedicoProc')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TarifaMedicoProc entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tarifamedicoproc'));
    }

    /**
     * Creates a form to delete a TarifaMedicoProc entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tarifamedicoproc_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
