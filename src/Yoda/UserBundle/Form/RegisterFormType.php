<?php

namespace Yoda\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;

class RegisterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', 'text', array(
            'required' => false,
            'pattern' => '[A-Za-z0-9]+',
        ))
            ->add('email', 'email')
            ->add('plainPassword', 'repeated', array(
            'type' => 'password'
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Yoda\UserBundle\Entity\User',
        ));
    }

    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        $view['plainPassword']->vars['firstLabel'] = 'Password';
        $view['plainPassword']->vars['secondLabel'] = 'Repeat Password';
    }

    public function getName()
    {
        return 'user_register';
    }
}