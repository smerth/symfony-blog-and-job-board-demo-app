<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Service\Greeter;

/**
 * Controller used to demonstrate services and parameters.
 * http://www.sitepoint.com/understanding-symfony-bundle-configuration-service-container/
 *
 * In this controller we call a service
 */
class GreeterController extends Controller
{
    /**
     *
     * @Route("/hello/{name}")
     *
     */
    public function indexAction($name)
    {
        $greeter = $this->get('appbundle.greeter');

//        return new Response(
        $output = $greeter->greet($name);
//        );

        return $this->render('codepages/pages/index.html.twig', array('output' => $output));
    }
}
