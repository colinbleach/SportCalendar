<?php

namespace Tests\AppBundle\Controller;
use AppBundle\Entity\Exercise;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testIndex()
    {
        $exercise = $this->getMock(Exercise::class);


        $exercise->expects($this->once())
            ->method('findBy')
            ->will($this->retunrValue());

        $service = $this->getMockBuilder('app.exercise')
            ->disableOriginalConstructor()
            ->getMock();

    }
}
