<?php
// src/AppBundle/Admin/PostAdmin.php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PostAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
    	// ToDo - Why do I have to repeat the code here that I used to make the CRUD form for this entity?
    	// Is the assumption that everything will be created through Sonata Admin
    	// for all users?
    	// TODO - figure out how to get slugify to work on this form by checking how it works for regular CRUD form
        $formMapper
            ->add('title')
            ->add('slug')
            ->add('summary', 'textarea')
            ->add('content', 'textarea', array(
                'attr' => array('rows' => 20),
            ))
            ->add('authorEmail', 'email')
            ->add('publishedAt', 'datetime', array(
                'widget' => 'single_text',
            ))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            // ->add('author')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('slug')
            ->add('publishedAt', 'datetime')
            // TODO - how to make this email in the Admin list into a link to the referenced user?
            ->add('authorEmail', 'email')
        ;
    }
}