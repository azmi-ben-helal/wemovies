<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Provider\MovieProvider;

class MovieController extends AbstractController
{
    /**
     * @Route("/movies", options={"expose"=true}, name="movie")
     */
    public function listMovies(Request $request, MovieProvider $movieProvider)
    {
        if($request->isXmlHttpRequest()) {
            $id = $request->request->get('id');
        }

        return $this->render('movie/movie.html.twig',
            [
                'genres' => $movieProvider->getListGenre(),
                'movies' => $movieProvider->getMoviesByGenre(28)['results']
            ]);
    }
}
