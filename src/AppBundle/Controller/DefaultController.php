<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Presentation;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/accueil.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * Slider
     */
    public function sliderAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sliders = $em->getRepository('AppBundle:Slider')->findAll();

        return $this->render('fr/slider.html.twig', array(
            'sliders' => $sliders,
        ));
    }

    /**
     * @Route("/accueil_presentation", name="fr_accueil_presentation")
     */
    public function accueilpresentationAction()
    {
        $em = $this->getDoctrine()->getManager();

        $presentations = $em->getRepository('AppBundle:Accueil')->findAll();

        return $this->render('fr/accueil_presentation.html.twig', array(
            'presentations' => $presentations,
        ));
    }

    /**
     * @Route("/accueil_menu_presentation", name="fr_accueil_menu_presentation")
     */
    public function amenupresentationAction()
    {
        $em = $this->getDoctrine()->getManager();

        $presentations = $em->getRepository('AppBundle:Presentation')->findAll();

        return $this->render('fr/amenu_presentation.html.twig', array(
            'presentations' => $presentations,
        ));
    }

    /**
     * @Route("/accueil_menu_avantage", name="fr_accueil_menu_avantage")
     */
    public function amenuavantageAction()
    {
        $em = $this->getDoctrine()->getManager();

        $avantages = $em->getRepository('AppBundle:Avantage')->findAll();

        return $this->render('fr/amenu_avantage.html.twig', array(
            'avantages' => $avantages,
        ));
    }

    /**
     * @Route("/accueil_menu_communaute", name="fr_accueil_menu_communaute")
     */
    public function amenucommunauteAction()
    {
        $em = $this->getDoctrine()->getManager();

        $communautes = $em->getRepository('AppBundle:Communaute')->findAll();

        return $this->render('fr/amenu_communaute.html.twig', array(
            'communautes' => $communautes,
        ));
    }

    /**
     * @Route("/accueil_menu_contact", name="fr_accueil_menu_contact")
     */
    public function amenucontactAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contacts = $em->getRepository('AppBundle:Contact')->findAll();

        return $this->render('fr/amenu_contact.html.twig', array(
            'contacts' => $contacts,
        ));
    }
}
