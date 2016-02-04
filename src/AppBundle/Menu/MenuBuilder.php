<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class MenuBuilder
 * @package AppBundle\Menu
 */
class MenuBuilder extends ContainerAware
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param RequestStack $requestStack
     * @return \Knp\Menu\ItemInterface
     */
    public function createMainMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttributes(array('class' => 'nav navbar-nav'));

        $menu->addChild('Home', array('route' => 'homepage'))
            ->setAttribute('icon', 'fa fa-home');
        $menu->addChild('Blog', array('route' => 'blog_index'))
            ->setAttribute('icon', 'fa fa-book');
        $menu->addChild('Jobs', array('route' => 'Sm_job'))
            ->setAttribute('icon', 'fa fa-briefcase');
        // ... add more children

        return $menu;
    }

    /**
     * @param RequestStack $requestStack
     * @return \Knp\Menu\ItemInterface
     */
    public function createUserMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttributes(array('class' => 'dropdown-menu'));


        $menu->addChild('View Your Dashboard', array('route' => 'sonata_user_profile_show'))
            ->setAttribute('icon', 'fa fa-eye');

        $menu->addChild('Edit Your Profile', array('route' => 'sonata_user_profile_edit'))
            ->setAttribute('icon', 'fa fa-pencil-square-o');

        $menu->addChild('Change Your Password', array('route' => 'sonata_user_change_password'))
            ->setAttribute('icon', 'fa fa-key');

        $menu->addChild('Not a link');
        $menu['Not a link']->setAttribute('role', 'separator');
        $menu['Not a link']->setAttribute('class', 'divider');

        $menu->addChild('Logout', array('route' => 'fos_user_security_logout'))
            ->setAttribute('icon', 'fa fa-sign-out');

        // ... add more children

        return $menu;
    }

}