<?php

namespace App\Controller;

use App\OpenDotaBundle\Client\HeroClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/hero")
 */
class HeroController extends AbstractController
{
    /**
     * @Route("/", name="hero_index", methods={"GET"})
     * @param HeroClient $heroClient
     * @return Response
     */
    public function index(HeroClient $heroClient): Response
    {
        return $this->render('hero/index.html.twig', [
            'heroes' => $heroClient->getHeroes(),
        ]);
    }

    /**
     * @Route("/{heroId}/matches", name="hero_matches_show", methods={"GET"})
     * @param HeroClient $heroClient
     * @param int $heroId
     * @return Response
     */
    public function show(HeroClient $heroClient, int $heroId): Response
    {
        return $this->render('hero/matches.html.twig', [
            'matches' => $heroClient->getHeroMatches($heroId),
        ]);
    }
}
