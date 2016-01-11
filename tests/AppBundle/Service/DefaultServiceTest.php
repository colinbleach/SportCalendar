<?php

namespace Tests\AppBundle\Service;
use AppBundle\Entity\Exercise as ExerciseEntity;

use AppBundle\Service\Exercise;
use PHPUnit_Framework_MockObject_MockObject;

class DefaultServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testIndex()
    {
        $ex1 = new ExerciseEntity();
        $ex1->setDate(new \DateTime('2016-01-11'));

        $ex2 = $this
            ->getMockBuilder(ExerciseEntity::class)
            ->getMock();

        $ex2->expects($this->any())
            ->method('getDate')
            ->will($this->returnValue(new \DateTime('2016-01-4')));

        $ex3 = $this
            ->getMockBuilder(ExerciseEntity::class)
            ->getMock();

        $ex3->expects($this->any())
            ->method('getDate')
            ->will($this->returnValue(new \DateTime('2015-12-28')));

        $value = array(
            $ex1,
            $ex2,
            $ex2,
            $ex2,
            $ex3,
            $ex3
        );

        $exerciseRepository = $this
            ->getMockBuilder('\Doctrine\ORM\EntityRepository')
            ->disableOriginalConstructor()
            ->setMethods(array('findBy'))
            ->getMock();

        $exerciseRepository
            ->expects($this->once())
            ->method('findBy')
            ->will($this->returnValue($value));

        /** @var \PHPUnit_Framework_MockObject_MockObject | \Doctrine\ORM\EntityManager $emMock */
        $emMock = $this
            ->getMockBuilder('\Doctrine\ORM\EntityManager')
            ->disableOriginalConstructor()
            ->getMock();

        $emMock->expects($this->once())
            ->method('getRepository')
            ->with('AppBundle:Exercise')
            ->will($this->returnValue($exerciseRepository));

        $service = new Exercise($emMock);

        $actualData = $service->getExerciseData();

        //$this->assertArrayHasKey('today', $actualData);
        //$this->assertArrayHasKey('week ago', $actualData);
var_dump($actualData); die;
        $this->assertCount(1, $actualData[date('Y-m-d')]);
        $this->assertCount(3, $actualData[date('Y-m-d', strtotime("-1 week"))]);
        $this->assertCount(2, $actualData[date('Y-m-d', strtotime("-2 week"))]);

    }

}
