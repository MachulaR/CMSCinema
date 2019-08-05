<?php

namespace App\Controller;


use App\Entity\Movies;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

class DashboardController extends AbstractController
{
    /**
     * @var RouterInterface
     */
    private $router;
    /**
     * @var FlashBagInterface
     */
    private $flashBag;

    public function __construct(
        RouterInterface $router, FlashBagInterface $flashBag)
    {
        $this->router = $router;
        $this->flashBag = $flashBag;
    }

    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(){

        return $this->render('dashboard/index.html.twig');
    }

    /**
     * @Route("/dashboard/cinema-halls", name="cinema-halls")
     */
    public function cinema_halls(){

        return $this->render('dashboard/cinema_halls.html.twig');
    }

    /**
     * @Route("/dashboard/movie-data/page={page}", name="movie-data", requirements={"page"="\d+"})
     */
    public function movie_data(Request $request, $page){
        $limit = 10;
        $number_of_pages = ceil(sizeof($this->getMovies())/$limit);
        if ($page < 1) {
            return $this->redirectToRoute('movie-data', ['page' => 1]);
        } else if ($page > $number_of_pages) {
            return $this->redirectToRoute('movie-data', ['page' => $number_of_pages]);
        }
        $task = new Movies();

        $form = $this->createFormBuilder($task)
            ->add('id', HiddenType::class ) //HiddenType
            ->add('title_pl', TextType::class )
            ->add('title_original', TextType::class)
            ->add('trailer', TextType::class)
            ->add('img', TextType::class)
            ->add('info', TextType::class)
            ->add('description', TextType::class)
            ->add('screen_time', TextType::class)
            ->add('cinema_halls', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Submit'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();

            ($task->getId() ? $this->updateMovie($task) : $this->addMovie($task) );

            return $this->redirectToRoute('movie-data');
        }

        $viewData = [
            'page' => $page,
            'size' => $number_of_pages,
            'movie_list' => $this->getMoviesByPages($page-1, $limit),
        ];

        return $this->render('dashboard/movie_data.html.twig', ['data'=>$viewData, 'form' => $form->createView()]);
    }

    /**
     * @Route("/dashboard/movie-data/delete/{id}", name="dashboard/movie_delete")
     */
    public function deleteMovieById($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $movie = $entityManager->getRepository(Movies::class)->find($id);

        if (!$movie) {
            throw $this->createNotFoundException(
                'Product not found'
            );
        }

        $entityManager->remove($movie);
        $entityManager->flush();

        $this->flashBag->add('notice', 'record is deleted');

        return $this->redirectToRoute('movie-data');
    }

    private function getMovies()
    {
        $movies = $this->getDoctrine()
            ->getRepository(Movies::class)
            ->findAll();

        return $movies;
    }

    private function getMoviesByPages(int $page, int $limit)
    {
        $movies = $this->getDoctrine()
            ->getRepository(Movies::class)
            ->findBy([], null, $limit, $page * $limit);


        return $movies;
    }

    private function addMovie($task)
    {
        $task->setAddTimestamp((date("Y-m-d H:i:s")) );

        $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($task);
         $entityManager->flush();

        $this->flashBag->add('notice', 'added record ');
    }

    private function updateMovie($task)
    {
        $task->setEditTimestamp((date("Y-m-d H:i:s")) );

        $id = $task->getId();
        $entityManager = $this->getDoctrine()->getManager();
        $movie = $entityManager->getRepository(Movies::class)->find($id);

        if (!$movie) {
            throw $this->createNotFoundException(
                'No movie found for id ' .$id
            );
        }

        $movie->setTitlePl($task->getTitlePl());
        $movie->setTitleOriginal($task->getTitleOriginal());
        $movie->setTrailer($task->getTrailer());
        $movie->setImg($task->getImg());
        $movie->setInfo($task->getInfo());
        $movie->setDescription($task->getDescription());
        $movie->setScreenTime($task->getScreenTime());
        $movie->setCinemaHalls($task->getCinemaHalls());
        $movie->setEditTimestamp($task->getEditTimestamp());

        $entityManager->flush();

        $this->flashBag->add('notice', 'record edited');
    }

}
