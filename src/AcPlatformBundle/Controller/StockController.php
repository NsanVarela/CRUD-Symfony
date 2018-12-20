<?php

namespace AcPlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class StockController extends Controller
{
    public function indexAction($entreprise, $produit, $numero)
    {
        return new Response("Le stock de l'entreprise ".$entreprise. " du produit ".$produit." portant le numéro ".$numero);
    }
}