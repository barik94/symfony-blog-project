<?php
/**
 * Created by PhpStorm.
 * User: BARIK
 * Date: 03.04.14
 * Time: 17:08
 */

namespace Blogger\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EditUserInfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username','text');
        $builder->add('email','email');
        $builder->add('roles');
        $builder->add('password', 'password');
    }

    public function getName()
    {
        return 'edit_user_info';
    }
} 