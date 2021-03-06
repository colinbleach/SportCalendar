<?php
namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraints\DateTime;

class Exercise
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getExerciseData($date = null)
    {
        if ($date === null) {
            $today = date("Y-m-d");
            $lastweek = date("Y-m-d", strtotime("-1 week"));
            $twoweek = date("Y-m-d", strtotime("-2 week"));
        }
        else
        {
            $today = $date->format('Y-m-d');
            $lastweek = $date->modify('-1 week')->format('Y-m-d');
            $twoweek = $date->modify('-1 week')->format('Y-m-d');
        }

        $data = $this->em->getRepository('AppBundle:Exercise')
            ->findBy(array('date'=>[$today,$lastweek,$twoweek]));

        $result = array();

        foreach($data as $key=>$value)
        {
            $result[$value->getDate()->format('Y-m-d')][] = $value;
        }

        return $result;
    }
}