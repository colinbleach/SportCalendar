<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Exercise;

class LoadData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $exercise = new Exercise();

        $manager->persist($exercise);
        $manager->flush();
    }
}