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
        if ($request->isXmlHttpRequest()) {
            $id = $request->get('id');
            return new Response($this->renderView('movie/moviesList.html.twig', array( 'movies' => $movieProvider->getMoviesByGenre($id)['results'])));
        }

        return $this->render('movie/movie.html.twig',
            [
                'genres' => $movieProvider->getListGenre(),
                'movies' => $movieProvider->getMoviesByGenre()['results']
            ]);
    }

    /**
     * @Route("/search", options={"expose"=true}, name="search")
     */
    public function searchMovies(Request $request, MovieProvider $movieProvider)
    {
        if ($request->isXmlHttpRequest()) {
            $value = $request->get('value');
            return new Response($this->renderView('movie/moviesList.html.twig', array( 'movies' => $movieProvider->searchMovie($value)['results'])));
        }

        return $this->render('movie/movie.html.twig',
            [
                'genres' => $movieProvider->getListGenre(),
                'movies' => $movieProvider->getMoviesByGenre()['results']
            ]);
    }
}
