<?php
namespace tests\AppBundle\Util;

require_once 'MatchesController.php';


class MatchesControllerTest extends \PHPUnit_Framework_TestCase
{

    public function testmatchesAction()
    {
        $test = new MatchesController();

        $result = $test->matchesAction("Garen","Darius");

            $this->assertEquals("Garen", $result);


    }
}