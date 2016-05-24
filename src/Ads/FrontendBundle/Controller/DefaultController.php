<?php

namespace Ads\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home_page")
     */
    public function indexAction()
    {

        $ads = $this->getDoctrine()->getRepository('AdsProcessBundle:Advertisement')->findAll();


        return $this->render('AdsFrontendBundle:Default:adsList.html.twig', array(
            'ads' => $ads
        ));
    }
    /**
     * @Route("/my-content", name="user_content")
     */
    public function userContent()
    {
        if ($this->getUser()) {
            $ads = $this->getDoctrine()->getRepository('AdsProcessBundle:Advertisement')->findBy(['userAdded' => $this->getUser()]);

            return $this->render('AdsFrontendBundle:Default:myContent.html.twig', array(
                'ads' => $ads
            ));
        } else {
            return $this->redirectToRoute('home_page');
        }

    }
}
