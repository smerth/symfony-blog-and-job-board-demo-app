<?php

namespace Sm\JobsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sm\JobsBundle\Entity\Job;

class JobType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'choice', array(
                    'choices' => Job::getTypes(),
                    'expanded' => true,
                    'data' => 'full-time'
                    // 'label_attr' => array('class' => 'col-sm-4')
                )
            )
            ->add('company', 'text', array(
                    // 'label_attr' => array('class' => 'col-sm-4')
                )
            )
            ->add('file', 'file', array(
                    'label' => 'Company logo',
                    // 'label_attr' => array('class' => 'col-sm-4'),
                    'required' => false
                )
            )
            ->add('url', null, array(
                    // 'label_attr' => array('class' => 'col-sm-4')
                )
            )
            ->add('position', null, array(
                    // 'label_attr' => array('class' => 'col-sm-4')
                )
            )
            ->add('location', null, array(
                    // 'label_attr' => array('class' => 'col-sm-4')
                )
            )
            ->add('description', null, array(
                    // 'label_attr' => array('class' => 'col-sm-4')
                )
            )
            ->add('how_to_apply', null, array(
                    'label' => 'How to apply?'
                    // 'label_attr' => array('class' => 'col-sm-4')
                )
            )
            ->add('is_public', null, array(
                    'label' => 'Public?'
                    // 'label_attr' => array('class' => 'col-sm-4')
                )
            )
            ->add('email', null, array(
                    // 'label_attr' => array('class' => 'col-sm-4')
                )
            )
            ->add('category', null, array(
                    // 'label_attr' => array('class' => 'col-sm-4')
                )
            )
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sm\JobsBundle\Entity\Job'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Sm_Jobsbundle_jobtype';
    }
}
