<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


Class vardumpController extends Controller 
{

/**
 * @Route("/debug/dump-user")
 */
public function indexAction()
	{
		$user = $this->container->get('fos_user.user_manager')
		->findUserByUsername('Smerth')
		;

		var_dump($user);die;

		return $this->render('AppBundle:Welcome:index.html.twig');
	}
}