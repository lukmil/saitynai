<?php

namespace AppBundle\Controller;


use AppBundle\Entity\champion;
use AppBundle\Entity\matches;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class MatchesController extends Controller
{
    /**
     * @Route("/matches/{champ},{champ2}", name="matchesHome", defaults={"champ" = 1,"champ2" = 15})
     */
    public function matchesAction(Request $request,champion $champ,champion $champ2)
    {

        $copyChamp = $champ;
        $champion = new champion();
        $criteria = ['champion1' => $champ ,
                     'champion2' => $champ2 ];
        $champ = $this->getDoctrine()
            ->getRepository('AppBundle:matches')
            ->findBy($criteria);

        if (!$champ)  {
           $champ = $copyChamp;
           $criteria  = ['champion1' => $champ2 ,
                'champion2' => $champ ];
            $champ = $this->getDoctrine()
            ->getRepository('AppBundle:matches')
            ->findBy($criteria);
}

        $champion = $this->getDoctrine()
            ->getRepository('AppBundle:champion')
            ->findAll();
        return $this->render('AppBundle:uzduotis:matches.html.twig', [
            'champions' => $champion,
            'test' => $champ
        ]);
    }

    /**
     * @Route("/matches3x3/{champ},{champ2},{champ3},{champ4},{champ5},{champ6}", name="matches3x3Home",
     *     defaults={"champ" = 1,"champ2" = 15,"champ3" = 1,"champ4" = 15,"champ5" = 1,"champ6" = 15})
     */
    public function match3x3nAction(Request $request,champion $champ,champion $champ2,champion $champ3,champion $champ4,champion $champ5,champion $champ6)
    {

        $champion = new champion();
        $criteria = ['champion1' => $champ ,
            'champion2' => $champ2 ];
        $criteria2 = ['champion1' => $champ3 ,
            'champion2' => $champ4 ];
        $criteria3 = ['champion1' => $champ5 ,
            'champion2' => $champ6 ];
        $champ = $this->getDoctrine()
            ->getRepository('AppBundle:matches')
            ->findBy($criteria);
        $champ3 = $this->getDoctrine()
            ->getRepository('AppBundle:matches')
            ->findBy($criteria2);
        $champ5 = $this->getDoctrine()
            ->getRepository('AppBundle:matches')
            ->findBy($criteria3);

        $champion = $this->getDoctrine()
            ->getRepository('AppBundle:champion')
            ->findAll();
        return $this->render('AppBundle:uzduotis:matches3x3.html.twig', [
            'champions' => $champion,
            'topChamps' => $champ,
            'midChamps' => $champ3,
            'botChamps' => $champ5
        ]);
    }

}
