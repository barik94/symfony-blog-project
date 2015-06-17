<?php

namespace Blogger\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EditPostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title','text');
        $builder->add('category');
        $builder->add('image','text');
        $builder->add('blog', 'textarea');
    }

    public function getName()
    {
        return 'edit_post';
    }
} 