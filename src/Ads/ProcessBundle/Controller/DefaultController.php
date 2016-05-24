<?php

namespace Ads\ProcessBundle\Controller;

use Ads\ProcessBundle\Entity\Advertisement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/add-content/", name="add_content")
     */
    public function addAction(Request $request)
    {
        // just setup a fresh $task object (remove the dummy data)
        $ad = new Advertisement();

        $form = $this->createFormBuilder($ad)
            ->add('title', TextType::class, array('label' => 'Pavadinimas'))
            ->add('description', TextareaType::class, array('label' => 'Aprašymas'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $ad->setPostingDate(date("Y-m-d H:i:s"));
            $ad->setUserAdded($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($ad);
            $em->flush();


            return $this->redirectToRoute('home_page');
        }

        return $this->render('AdsProcessBundle:Default:addContent.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
