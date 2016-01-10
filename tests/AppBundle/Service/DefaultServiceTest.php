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
        $ex1->setDate(new \DateTime('2016-01-10'));

        $ex2 = $this->getMockBuilder(ExerciseEntity::class)->getMock();

        $ex2->expects($this->any())->method('getDate')->will($this->returnValue(new \DateTime('2016-01-10')));

        $value = array(
            $ex1,
            $ex2,
        );
        //$exercise = $this->getMockBuilder(Exercise::class)->getMock();

        $exerciseRepository = $this
            ->getMockBuilder('Doctrine\ORM\EntityRepository')
            ->disableOriginalConstructor()
            ->setMethods(array('findBy'))
            ->getMock();

        $exerciseRepository->expects($this->once())
            ->method('findBy')
            ->will($this->returnValue($value));

        /** @var \PHPUnit_Framework_MockObject_MockObject | \Doctrine\ORM\EntityManager $emMock */
        $emMock = $this->getMockBuilder('Doctrine\ORM\EntityRepository')->getMock();

        $emMock->expects($this->once())->method(array('getRepository'))
            ->with('AppBundle:Exercise')
            ->will($this->returnValue($exerciseRepository));

        $service = new Exercise($emMock);

        $actualData = $service->getExerciseData();

        //$this->assertArrayHasKey('today', $actualData);
        //$this->assertArrayHasKey('week ago', $actualData);

        $this->assertCount(2, $actualData['2016-01-10']);

    }
}
