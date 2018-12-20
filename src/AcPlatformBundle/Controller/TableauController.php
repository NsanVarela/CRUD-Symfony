<?php

namespace AcPlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class TableauController extends Controller
{
    public function indexAction($nombre1, $nombre2)
    {
        $resultat = $nombre1 * $nombre2;
        return new Response("
            <table>
                <tr>
                    <td>*</td>
                    <td>".$nombre1."</td>
                </tr>
                <tr>
                    <td>".$nombre2."</td>
                    <td>".$resultat."</td>
                </tr>
            </table>");
    }
}