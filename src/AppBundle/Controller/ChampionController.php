<?php

namespace AppBundle\Controller;


use AppBundle\Entity\champion;
use AppBundle\Form\ChampionType;
use AppBundle\Form\ChampionsType;
use AppBundle\Form\ChampionTypes;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class ChampionController extends Controller
{
    /**
     * @Route("/champion/{champ}", name="champHome", defaults={"champ" = 1})
     */
    public function ChampionAction(Request $request,champion $champ)
    {
        $champi = new champion();
        $strongerChamp = $champ;
        $strongerChamp2 = $champ;

        $criteria = ['champion1' => $strongerChamp];
        $criteria2 = ['champion2' => $strongerChamp2];
        $strongerChamp = $this->getDoctrine()
            ->getRepository('AppBundle:matches')
            ->findBy($criteria);
        $strongerChamp2 = $this->getDoctrine()
            ->getRepository('AppBundle:matches')
            ->findBy($criteria2);



        $form2 = $this->createForm(ChampionType::class, $champi);
        $form3 = $this->createForm(ChampionsType::class, $champ);
        $form4 = $this->createForm(ChampionTypes::class, $champ);

        $form2->handleRequest($request);
        $form3->handleRequest($request);
        $form4->handleRequest($request);


        if ($form2->isValid() && $form2->isSubmitted()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($champi);
            $em->flush();

        }
        if ($form3->isValid() && $form3->isSubmitted()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($champ);
            $em->flush();

        }
        if ($form4->isValid() && $form4->isSubmitted()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->remove($champ);
            $em->flush();


        }
        $champ = $this->getDoctrine()
            ->getRepository('AppBundle:champion')
            ->findAll();
        return $this->render('AppBundle:uzduotis:champions.html.twig', [
            'form2' => $form2->createView(),
            'form3' => $form3->createView(),
            'form4' => $form4->createView(),
            'champions' => $champ,
            'stronger' => $strongerChamp,
            'stronger2' => $strongerChamp2
        ]);
    }

}
