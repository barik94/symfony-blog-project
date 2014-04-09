<?php
/**
 * Created by PhpStorm.
 * User: BARIK
 * Date: 09.04.14
 * Time: 17:28
 */

namespace Blogger\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EditCategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('catName','text');
        $builder->add('slug','text');
    }

    public function getName()
    {
        return 'edit_category';
    }
} 