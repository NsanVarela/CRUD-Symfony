<?php

namespace AcPlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        
        $prenom = 'Robert';

        return $this->render('@AcPlatform/Default/index.html.twig', array(
            'prenom' => $prenom,
            ));

    }

    public function prenomAction()
    {
        $prenom = 'Robert';

        return $this->render('@AcPlatform/Default/prenom.html.twig', array(
            'prenom' => $prenom,
        ));

    }


    public function redirectAction()
    {
        return $this->redirectToRoute('defaut');


    }

    public function personneAction()
    {
        $data_1 = array(
            "nom"  => array('Depardieu', 'hollande', 'diouf'),
            "prenom" => array('Depardieu', 'hollande', 'diouf'),
            "age"   => array(80, 42, 78),
            "sexe"   => array('M', 'M','M'),

        );

        // dump($data_1);
        // die;


        return $this->render('@AcPlatform/Default/prenom.html.twig', array(
            'data_1' => $data_1
        ));
    }
}