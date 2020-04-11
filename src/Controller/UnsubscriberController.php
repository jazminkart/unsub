<?php

namespace App\Controller;

use App\Entity\Unsubscriber;
use App\Form\UnsubscriberType;
use App\Repository\UnsubscriberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/unsubscriber")
 */
class UnsubscriberController extends AbstractController
{
    /**
     * @Route("/", name="unsubscriber_index", methods={"GET"})
     */
    public function index(UnsubscriberRepository $unsubscriberRepository): Response
    {
        return $this->render('unsubscriber/index.html.twig');
    }
    /**
     * @Route("/", name="unsubscriber_home", methods={"GET"})
     */
    public function home(UnsubscriberRepository $unsubscriberRepository): Response
    {
        return $this->render('unsubscriber/home.html.twig');
    }
    //http://127.0.0.1:8000/unsubscriber/new?offID=2121&Spsr=1231
    /**
     * @Route("/new", name="unsubscriber_new", methods={"GET","POST"})
     */
    public function new(Request $request ): Response
    {
        $unsubscriber = new Unsubscriber();
        $form = $this->createForm(UnsubscriberType::class, $unsubscriber);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = strtolower( $form->get('email')->getData() );
            $hashed_email=md5($email);
            $offerId=$request->query->get('offID');
            $Spsr=$request->query->get('Spsr');
            $isp= substr($email, strpos($email, '@') + 1);
            $date = new \DateTime('@'.strtotime('now'));
            
            $unsubscriber->setEmail($email);
            $unsubscriber->setHashedEmail($hashed_email);
            $unsubscriber->setOfferId($offerId);
            $unsubscriber->setSpsr($Spsr);
            $unsubscriber->setIsp($isp);
            $unsubscriber->setUnsubAt($date);


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($unsubscriber);
            $entityManager->flush();

            return $this->redirectToRoute('unsubscriber_index');
        }

        return $this->render('unsubscriber/new.html.twig', [
            'unsubscriber' => $unsubscriber,
            'form' => $form->createView(),
        ]);
    }

    

    /**
     * @Route("/{id}", name="unsubscriber_show", methods={"GET"})
     */
    public function show(Unsubscriber $unsubscriber): Response
    {
        return $this->render('unsubscriber/show.html.twig', [
            'unsubscriber' => $unsubscriber,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="unsubscriber_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Unsubscriber $unsubscriber): Response
    {
        $form = $this->createForm(UnsubscriberType::class, $unsubscriber);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('unsubscriber_index');
        }

        return $this->render('unsubscriber/edit.html.twig', [
            'unsubscriber' => $unsubscriber,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="unsubscriber_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Unsubscriber $unsubscriber): Response
    {
        if ($this->isCsrfTokenValid('delete'.$unsubscriber->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($unsubscriber);
            $entityManager->flush();
        }

        return $this->redirectToRoute('unsubscriber_index');
    }
}
