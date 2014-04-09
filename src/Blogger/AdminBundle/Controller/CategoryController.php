<?php
/**
 * Created by PhpStorm.
 * User: BARIK
 * Date: 09.04.14
 * Time: 17:12
 */

namespace Blogger\AdminBundle\Controller;


use Blogger\AdminBundle\Form\EditCategoryType;

use Blogger\BlogBundle\Entity\Blog;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller{

    public function managingCategoriesAction()
    {
        $em = $this->getDoctrine()
            ->getManager();

        $tags = $em->getRepository('BloggerBlogBundle:Category')
            ->getCategories();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $tags,
            $this->get('request')->query->get('page', 1)/*page number*/,
            5/*limit per page*/
        );

        return $this->render('BloggerAdminBundle:Category:index.html.twig', array(
            'pagination' => $pagination
        ));
    }

    public function editCategoryAction($categoryId)
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('BloggerBlogBundle:Category')->find($categoryId);

        if (!$category) {
            throw $this->createNotFoundException('Unable to find category.');
        }

        return $this->render('BloggerAdminBundle:Category:editCategory.html.twig', array(
            'category' => $category
        ));
    }

    public function editAction($categoryId)
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('BloggerBlogBundle:Category')->find($categoryId);

        if (!$category) {
            throw $this->createNotFoundException('Unable to find category.');
        }
        $form = $this->createForm(new EditCategoryType(), $category);

        return $this->render('BloggerAdminBundle:Category:form.html.twig', array(
            'form' => $form->createView(),
            'category' => $category
        ));
    }

    public function submitEditionAction(Request $request, $categoryId)
    {
        $em = $this->getDoctrine()
            ->getManager();
        $category = $em->getRepository('BloggerBlogBundle:Category')->find($categoryId);

        $form  = $this->createForm(new EditCategoryType(), $category);
        $form->submit($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()
                ->getManager();

            $isUnique = $em->getRepository('BloggerBlogBundle:Category')->isCategoryUnique($category->getCatName(), $category->getSlug(), $categoryId);

            if( $isUnique )
            {
                $em->persist($category);
                $em->flush();

                return $this->redirect($this->generateUrl('BloggerAdminBundle_edit_categories'));
            }


            $this->get('session')->getFlashBag()
                ->set('blogger-notice', 'Category with this name/slug already exists!!!');

            return $this->redirect($this->generateUrl('BloggerAdminBundle_edit_concrete_category', array('categoryId'=>$categoryId)));
        }

        return $this->render('BloggerAdminBundle:Category:form.html.twig', array(
            'category' => $category,
            'form' => $form->createView()
        ));
    }

    public function deleteAction($categoryId)
    {
        $em =  $this->getDoctrine()
            ->getManager();

        $category = $em->getRepository('BloggerBlogBundle:Category')->find($categoryId);

        $blogs = $em->getRepository('BloggerBlogBundle:Blog')->getPostsForCategory($categoryId);

        foreach($blogs as $blog )
        {
            $blog->setCategory();
            $em->persist($blog);
            $em->flush();
        }

        $em->remove($category);

        $em->flush();

        $em->getRepository('BloggerBlogBundle:Category')->getQuantityOfPostsInAllCategories();
        $em->flush();

        return $this->redirect($this->generateUrl('BloggerAdminBundle_homepage'));
    }
} 