<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\AController;

class CompagnieController extends AController
{

    public function indexAction(Request $request)
    {
        return $this->render('compagnie/afficher.html.twig');
    }

    public function afficherAction(Request $request)
    {
        return $this->render('compagnie/afficher.html.twig');
    }
}
