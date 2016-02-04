<?php

namespace Sm\HanziBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HanziBundle:Default:index.html.twig', array('name' => $name));
    }
}
