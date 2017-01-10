<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ImgCommunaute;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Imgcommunaute controller.
 *
 * @Route("admin/imgcommunaute")
 */
class ImgCommunauteController extends Controller
{
    /**
     * Lists all imgCommunaute entities.
     *
     * @Route("/", name="admin_imgcommunaute_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $imgCommunautes = $em->getRepository('AppBundle:ImgCommunaute')->findAll();

        return $this->render('imgcommunaute/index.html.twig', array(
            'imgCommunautes' => $imgCommunautes,
        ));
    }

    /**
     * Creates a new imgCommunaute entity.
     *
     * @Route("/new", name="admin_imgcommunaute_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $imgCommunaute = new Imgcommunaute();
        $form = $this->createForm('AppBundle\Form\ImgCommunauteType', $imgCommunaute);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($imgCommunaute);
            $em->flush($imgCommunaute);

            return $this->redirectToRoute('admin_imgcommunaute_show', array('id' => $imgCommunaute->getId()));
        }

        return $this->render('imgcommunaute/new.html.twig', array(
            'imgCommunaute' => $imgCommunaute,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a imgCommunaute entity.
     *
     * @Route("/{id}", name="admin_imgcommunaute_show")
     * @Method("GET")
     */
    public function showAction(ImgCommunaute $imgCommunaute)
    {
        $deleteForm = $this->createDeleteForm($imgCommunaute);

        return $this->render('imgcommunaute/show.html.twig', array(
            'imgCommunaute' => $imgCommunaute,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing imgCommunaute entity.
     *
     * @Route("/{id}/edit", name="admin_imgcommunaute_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ImgCommunaute $imgCommunaute)
    {
        $deleteForm = $this->createDeleteForm($imgCommunaute);
        $editForm = $this->createForm('AppBundle\Form\ImgCommunauteType', $imgCommunaute);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_imgcommunaute_edit', array('id' => $imgCommunaute->getId()));
        }

        return $this->render('imgcommunaute/edit.html.twig', array(
            'imgCommunaute' => $imgCommunaute,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a imgCommunaute entity.
     *
     * @Route("/{id}", name="admin_imgcommunaute_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ImgCommunaute $imgCommunaute)
    {
        $form = $this->createDeleteForm($imgCommunaute);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($imgCommunaute);
            $em->flush($imgCommunaute);
        }

        return $this->redirectToRoute('admin_imgcommunaute_index');
    }

    /**
     * Creates a form to delete a imgCommunaute entity.
     *
     * @param ImgCommunaute $imgCommunaute The imgCommunaute entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ImgCommunaute $imgCommunaute)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_imgcommunaute_delete', array('id' => $imgCommunaute->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
