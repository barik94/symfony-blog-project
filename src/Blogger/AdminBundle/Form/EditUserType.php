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

class EditUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name','text');
        $builder->add('slug','text');
    }

    public function getName()
    {
        return 'edit_tag';
    }
} 