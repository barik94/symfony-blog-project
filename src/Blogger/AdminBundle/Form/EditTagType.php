<?php
/**
 * Created by PhpStorm.
 * User: BARIK
 * Date: 02.04.14
 * Time: 17:21
 */

namespace Blogger\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EditTagType extends AbstractType
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