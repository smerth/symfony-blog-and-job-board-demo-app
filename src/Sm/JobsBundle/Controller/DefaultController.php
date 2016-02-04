<?php

namespace Sm\JobsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('JobsBundle:Default:index.html.twig', array('name' => $name));
    }
}
