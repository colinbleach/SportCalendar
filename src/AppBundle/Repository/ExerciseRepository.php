<?php

namespace AppBundle\Repository;
use Doctrine\ORM\EntityRepository;

/**
 * ExerciseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ExerciseRepository extends \Doctrine\ORM\EntityRepository
{

    public function getData($today,$lastWeek,$twoWeeksAgo)
    {
//        $queryBuilder = $this->getEntityManager()->createQueryBuilder();
//        $queryBuilder->select(['exercise.exercise','exercise.weight','exercise.count','exercise.date','exercise.time'])
//            ->where($queryBuilder->expr()->eq('exercise.date',':dateToday'))
//            ->orWhere($queryBuilder->expr()->eq('exercise.date',':dateLastWeek'))
//            ->orWhere($queryBuilder->expr()->eq('exercise.date',':dateTwoWeeks'))
//            ->setParameter('dateToday',$today)
//            ->setParameter('dateLastWeek',$lastWeek)
//            ->setParameter('dateTwoWeeks',$twoWeeksAgo)
//            ->from('AppBundle\Entity\Exercise','exercise');
//
//        return $queryBuilder->getQuery()->getResult();
    }
}
