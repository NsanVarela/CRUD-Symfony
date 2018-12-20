<?php

namespace AcPlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class PlatformController extends Controller
{
    public function indexAction($platform, $annee, $lien)
    {
        return new Response("La ".$platform." de l'année ".$annee." et du lien ".$lien);
    }
}