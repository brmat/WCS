<?php

namespace XdebugBundle\Controller;

use XdebugBundle\Entity\debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Debug controller.
 *
 */
class debugController extends Controller
{
    /**
     * Lists all debug entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $debugs = $em->getRepository('XdebugBundle:debug')->findAll();

        return $this->render('@Xdebug/debug/index.html.twig', array(
            'debugs' => $debugs,
        ));
    }

    /**
     * Creates a new debug entity.
     *
     */
    public function newAction(Request $request)
    {
        $debug = new Debug();
        $form = $this->createForm('XdebugBundle\Form\debugType', $debug);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($debug);
            $em->flush($debug);

            return $this->redirectToRoute('debug_show', array('id' => $debug->getId()));
        }

        return $this->render('@Xdebug/debug/new.html.twig', array(
            'debug' => $debug,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a debug entity.
     *
     */
    public function showAction(debug $debug)
    {
        $deleteForm = $this->createDeleteForm($debug);

        return $this->render('@Xdebug/debug/show.html.twig', array(
            'debug' => $debug,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing debug entity.
     *
     */
    public function editAction(Request $request, debug $debug)
    {
        $deleteForm = $this->createDeleteForm($debug);
        $editForm = $this->createForm('XdebugBundle\Form\debugType', $debug);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('debug_edit', array('id' => $debug->getId()));
        }

        return $this->render('@Xdebug/debug/edit.html.twig', array(
            'debug' => $debug,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a debug entity.
     *
     */
    public function deleteAction(Request $request, debug $debug)
    {
        $form = $this->createDeleteForm($debug);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($debug);
            $em->flush($debug);
        }

        return $this->redirectToRoute('debug_index');
    }

    /**
     * Creates a form to delete a debug entity.
     *
     * @param debug $debug The debug entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(debug $debug)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('debug_delete', array('id' => $debug->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
