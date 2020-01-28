<?php

namespace App\Controller;

use mtgsdk\Card;
use mtgsdk\Set;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CollectionController
 * @package App\Controller
 */
class CollectionController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     * @return Response
     */
    public function indexAction(): Response
    {
        return $this->render('collection/index.html.twig');
    }

    /**
     * @Route("/cards", name="cards")
     * @return Response
     */
    public function cardsListAction(): Response
    {
        // Get all cards
        $cards = Card::where(['page' => 1])->all();

        return $this->render('collection/cards.html.twig', [
            'cards' => $cards
        ]);
    }

    /**
     * @Route("/sets", name="sets")
     * @return Response
     */
    public function setsListAction(): Response
    {
        // Get all sets
        $sets = Set::all();

        return $this->render('collection/sets.html.twig', [
            'sets' => $sets,
        ]);
    }
}
