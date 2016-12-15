<?php

namespace tests\AppBundle\Util;

class MatchesController
{

    public function matchesAction($champ, $champ2)
    {
        if ($champ != $champ2){
            return $champ;
        }
        else {
            return $champ2;
        }
    }

}
