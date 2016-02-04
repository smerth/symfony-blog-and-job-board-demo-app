<?php

namespace Sm\JobsBundle\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategoryControllerTest extends WebTestCase
{
    public function testShow()
    {
        // get the custom parameters from app config.yml
        $kernel = static::createKernel();
        $kernel->boot();
        $max_jobs_per_category_on_homepage = $kernel->getContainer()->getParameter('max_jobs_per_category_on_homepage');
        $max_jobs_on_category = $kernel->getContainer()->getParameter('max_jobs_on_category');

        $client = static::createClient();

        // categories on homepage are clickable
        $crawler = $client->request('GET', '/');
        $link = $crawler->selectLink('Programming')->link();
        $crawler = $client->click($link);
        $this->assertEquals('Sm\JobsBundle\Controller\CategoryController::showAction', $client->getRequest()->attributes->get('_controller'));
        $this->assertEquals('programming', $client->getRequest()->attributes->get('slug'));

        // This is hardly a robust test as it relies on the specific "number" of a more link in order to work..
        // categories with more than $max_jobs_on_homepage jobs also have a "more" link
        $crawler = $client->request('GET', '/');
        $link = $crawler->selectLink('71')->link();
        $crawler = $client->click($link);
        $this->assertEquals('Sm\JobsBundle\Controller\CategoryController::showAction', $client->getRequest()->attributes->get('_controller'));
        $this->assertEquals('programming', $client->getRequest()->attributes->get('slug'));

        // only $max_jobs_on_category jobs are listed
//        $this->assertTrue($crawler->filter('.jobs tr')->count() assertRegExp('/76 jobs/', $crawler->filter('.pagination_desc')->text());
//    $this->assertRegExp('/page 1\/2/', $crawler->filter('.pagination_desc')->text());

//    $link = $crawler->selectLink('2')->link();
//    $crawler = $client->click($link);
//    $this->assertEquals(2, $client->getRequest()->attributes->get('page'));
//    $this->assertRegExp('/page 2\/2/', $crawler->filter('.pagination_desc')->text());
    }
}