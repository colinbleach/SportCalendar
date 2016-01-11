<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Service\ExerciseService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/{_locale}/home", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $exercisedata = $this->get('app.exercise');
        $data = $exercisedata->getExerciseData();

        return $this->render('AppBundle::calendar.html.twig',
            array('data' => $data)
        );
    }
}
