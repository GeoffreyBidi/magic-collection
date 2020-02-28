<?php

namespace App\Services;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Class MtgApi
 * @package App\Services
 */
class MtgApi
{
    /**
     * @var string
     */
    private $endpoint;

    /**
     * @var string
     */
    private $version;

    /**
     * MtgApi constructor.
     * @param ParameterBagInterface $parameterBag
     */
    public function __construct(ParameterBagInterface $parameterBag)
    {
        $mtgApiParams   = $parameterBag->get('app.api')['mtg'];
        $this->endpoint = $mtgApiParams['endpoint'];
        $this->version  = $mtgApiParams['version'];
    }

    /**
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getAllCards()
    {
        $client = HttpClient::create();

        return $client->request('GET', $this->endpoint . $this->version . '/cards');
    }
}
