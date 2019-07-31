<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{

    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(){



        return $this->render('dashboard/index.html.twig');
    }

    /**
     * @Route("/dashboard/cinema-halls")
     */
    public function cinema_halls(){

        return $this->render('dashboard/cinema_halls.html.twig');
    }

    /**
     * @Route("/dashboard/movie-data")
     */
    public function movie_data(){

        return $this->render('dashboard/movie_data.html.twig');
    }



}