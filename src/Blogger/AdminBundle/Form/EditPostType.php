<?php
/**
 * Created by PhpStorm.
 * User: BARIK
 * Date: 13.03.14
 * Time: 15:52
 */

namespace Blogger\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


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