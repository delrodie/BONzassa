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
     * Acceuil admin
     */
    public function adminAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
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

    /**
     * @Route("/menu_presentation", name="fr_menu_presentation")
     */
    public function menupresentationAction()
    {
        $em = $this->getDoctrine()->getManager();

        $presentations = $em->getRepository('AppBundle:Presentation')->getMenu();

        return $this->render('fr/menu_presentation.html.twig', array(
            'presentations' => $presentations,
        ));
    }

    /**
     * @Route("/menu_avantage", name="fr_menu_avantage")
     */
    public function menuavantageAction()
    {
        $em = $this->getDoctrine()->getManager();

        $avantages = $em->getRepository('AppBundle:Avantage')->getMenu();

        return $this->render('fr/menu_avantage.html.twig', array(
            'avantages' => $avantages,
        ));
    }

    /**
     * @Route("/menu_communaute", name="fr_menu_communaute")
     */
    public function menucommunauteAction()
    {
        $em = $this->getDoctrine()->getManager();

        $communautes = $em->getRepository('AppBundle:Communaute')->getMenu();

        return $this->render('fr/menu_communaute.html.twig', array(
            'communautes' => $communautes,
        ));
    }

    /**
     * @Route("/menu_contact", name="fr_menu_contact")
     */
    public function menucontactAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contacts = $em->getRepository('AppBundle:Contact')->getMenu();

        return $this->render('fr/menu_contact.html.twig', array(
            'contacts' => $contacts,
        ));
    }

    /**
     * @Route("/fr_evenement", name="fr_flash_evenement")
     */
    public function flashevenementAction()
    {
        $em = $this->getDoctrine()->getManager();

        $evenements = $em->getRepository('AppBundle:Evenement')->getEvenement();

        return $this->render('fr/flash_evenement.html.twig', array(
            'evenements' => $evenements,
        ));
    }

    /**
     * @Route("/fr_publicite", name="fr_flash_publicite")
     */
    public function flashpubliciteAction()
    {
        $em = $this->getDoctrine()->getManager();

        $publicites = $em->getRepository('AppBundle:Publicite')->getPublicite();

        //var_dump($publicites);

        //die($publicites);

        return $this->render('fr/flash_publicite.html.twig', array(
            'publicites' => $publicites,
        ));
    }

    /**
     * Finds and displays a presentation entity.
     *
     */
    public function presentationAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        //$articles = $em->getRepository('AppBundle:Article')->findAll();
        //$cle = 'Présentation';
        $presentations = $em->getRepository('AppBundle:Presentation')->getArticle($slug);
        //var_dump($article);
        //die();
        return $this->render('fr/presentation.html.twig', array(
            'presentations' => $presentations,
        ));
    }

    /**
     * Finds and displays a presentation entity.
     *
     */
    public function avantageAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        //$articles = $em->getRepository('AppBundle:Article')->findAll();
        //$cle = 'Présentation';
        $avantages = $em->getRepository('AppBundle:Avantage')->getArticle($slug);
        //var_dump($article);
        //die();
        return $this->render('fr/avantage.html.twig', array(
            'avantages' => $avantages,
        ));
    }

    /**
     * Finds and displays a Communaute entity.
     *
     */
    public function communauteAction($slug)
    {
        $em = $this->getDoctrine()->getManager();


        $communautes = $em->getRepository('AppBundle:Communaute')->getArticle($slug);

        return $this->render('fr/communaute.html.twig', array(
            'communautes' => $communautes,
        ));
    }

    /**
     * Finds and displays a Contact entity.
     *
     */
    public function contactAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $contacts = $em->getRepository('AppBundle:Contact')->getArticle($slug);

        if ($slug === 'contacter-l-equipe') {
          return $this->render('fr/contact-equipe.html.twig', array(
              'contacts' => $contacts,
          ));
        }

        return $this->render('fr/contact.html.twig', array(
            'contacts' => $contacts,
        ));
    }
}
