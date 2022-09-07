<?php

namespace App\Provider;

use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 *
 */
class MovieProvider
{
    /**
     * HttpClientInterface
     */
    private HttpClientInterface $httpClient;

    /**
     * @var string $apiKey
     */
    private string $apiKey;
    /**
     * Constructor
     */
    public function __construct(HttpClientInterface $httpClient , string $apiKey)
    {
        $this->httpClient = $httpClient;
        $this->apiKey     = $apiKey;
    }

    public function getListGenre(): array
    {
        $response = $this->httpClient->request(
            'GET',
            'https://api.themoviedb.org/3/genre/movie/list?api_key=' . $this->apiKey
        );
        return $response->toArray()['genres'];
    }

    public function getMoviesByGenre(int $genreId = 28): array
    {
        $response = $this->httpClient->request(
            'GET',
            'https://api.themoviedb.org/3/discover/movie?api_key='.$this->apiKey.'&fbclid=IwAR0ryymIdQ_HvDI09N2RFTk-ZHN7UuPEUOqfJJWmoYg5MBRH4xgZfx2GMsg&with_genres='.$genreId
        );
        return $response->toArray();
    }
}