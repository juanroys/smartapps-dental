<?php

namespace SmartApps\HistClinicaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SmartApps\HistClinicaBundle\Entity\CostoProcedimiento;
use SmartApps\HistClinicaBundle\Form\CostoProcedimientoType;

/**
 * CostoProcedimiento controller.
 *
 */
class CostoProcedimientoController extends Controller
{

    /**
     * Lists all CostoProcedimiento entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        //$entities = $em->getRepository('HistClinicaBundle:Procedimiento')->findAll();
        $paginador=  $this->get('ideup.simple_paginator');
        $entities=$paginador->paginate(
                $em->getRepository("HistClinicaBundle:CostoProcedimiento")->queryTodosLosCostos()
                )->getResult();
        return $this->render('HistClinicaBundle:CostoProcedimiento:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new CostoProcedimiento entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new CostoProcedimiento();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('costoProcedimiento_show', array('id' => $entity->getId())));
        }

        return $this->render('HistClinicaBundle:CostoProcedimiento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a CostoProcedimiento entity.
     *
     * @param CostoProcedimiento $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CostoProcedimiento $entity)
    {
        $form = $this->createForm(new CostoProcedimientoType(), $entity, array(
            'action' => $this->generateUrl('costoProcedimiento_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CostoProcedimiento entity.
     *
     */
    public function newAction()
    {
        $entity = new CostoProcedimiento();
        $form   = $this->createCreateForm($entity);

        return $this->render('HistClinicaBundle:CostoProcedimiento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CostoProcedimiento entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:CostoProcedimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CostoProcedimiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistClinicaBundle:CostoProcedimiento:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CostoProcedimiento entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:CostoProcedimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CostoProcedimiento entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistClinicaBundle:CostoProcedimiento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a CostoProcedimiento entity.
    *
    * @param CostoProcedimiento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CostoProcedimiento $entity)
    {
        $form = $this->createForm(new CostoProcedimientoType(), $entity, array(
            'action' => $this->generateUrl('costoProcedimiento_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CostoProcedimiento entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:CostoProcedimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CostoProcedimiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('costoProcedimiento'));
        }

        return $this->render('HistClinicaBundle:CostoProcedimiento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CostoProcedimiento entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HistClinicaBundle:CostoProcedimiento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CostoProcedimiento entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('costoProcedimiento'));
    }

    /**
     * Creates a form to delete a CostoProcedimiento entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('costoProcedimiento_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    public function listadoAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $entities = $em->getRepository('HistClinicaBundle:CostoProcedimiento')->getCostosPorConvenio($id);
        $procedimientos = $em->getRepository("HistClinicaBundle:Procedimiento")->findAll();        
        return $this->render('HistClinicaBundle:CostoProcedimiento:listado.html.twig', array(
            'entities' => $entities,
            'procedimientos' => $procedimientos,
            'convenioId' => $id,
        ));
    }
    
    public function guardarAction(){
        $em = $this->getDoctrine()->getManager();        
        $convenioId = $_POST["convenioId"];
        
        $convenio = $em->getRepository('HistClinicaBundle:Convenio')->find($convenioId);
        $tarifas = $em->getRepository('HistClinicaBundle:CostoProcedimiento')->getCostosPorConvenio($convenioId);
        foreach($tarifas as $tarifa)
        {
            $em->remove($tarifa);
        }
        $em->flush(); 
        
        $procedimientos = $em->getRepository("HistClinicaBundle:Procedimiento")->findAll();        
        foreach($procedimientos as $procedim)
        {
            if (!empty($_POST["txtValor" . $procedim->getId() ])) {
                $valor = $_POST["txtValor" . $procedim->getId() ];                                
                
                $tarifa = new \SmartApps\HistClinicaBundle\Entity\CostoProcedimiento();
                $tarifa->setConvenio($convenio);
                $tarifa->setProcedimiento($procedim);   
                $tarifa->setValor($valor);
                $em->persist($tarifa);
            }
        }
        $em->flush();
        return $this->redirect($this->generateUrl('costoProcedimiento_listado', array('id' => $convenioId)));
    }
}
