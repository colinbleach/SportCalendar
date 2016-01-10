<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Exercise;

class LoadExerciseData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $objects = \Nelmio\Alice\Fixtures::load(__DIR__.'/fixtures.yml', $manager, ['providers' => [$this]]);
    }

    public function randomExercise()
    {
        $exercise = ['exercise A', 'exercise B', 'exercise C'];

        return $exercise[array_rand($exercise)];
    }
}