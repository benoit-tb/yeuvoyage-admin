<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;


class DefaultController extends AController
{
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
}
