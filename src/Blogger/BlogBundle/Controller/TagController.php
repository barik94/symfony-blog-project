<?php
/**
 * Created by PhpStorm.
 * User: BARIK
 * Date: 26.03.14
 * Time: 15:25
 */

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TagController extends Controller
{
    public function onTagAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $tag = $em->getRepository('BloggerBlogBundle:Tag')->findBySlug($slug);

        $blogs = $em->getRepository('BloggerBlogBundle:Blog')->getPostsOnTag($tag->getId());

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $blogs,
            $this->get('request')->query->get('page', 1)/*page number*/,
            5/*limit per page*/
        );

        if (!$blogs) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $this->render('BloggerBlogBundle:Page:tag.html.twig', array(
            'pagination'      => $pagination,
            'tags' => $tag
        ));
    }
} 