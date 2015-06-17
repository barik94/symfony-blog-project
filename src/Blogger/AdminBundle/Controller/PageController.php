<?php

namespace Blogger\AdminBundle\Controller;

use Blogger\BlogBundle\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()
            ->getManager();

        $blogs = $em->getRepository('BloggerBlogBundle:Blog')
            ->getLatestBlogs();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $blogs,
            $this->get('request')->query->get('page', 1)/*page number*/,
            5/*limit per page*/
        );

        return $this->render('BloggerAdminBundle:Page:index.html.twig', array(
            'pagination' => $pagination
        ));
    }

    public function sidebarAction()
    {
        return $this->render('BloggerAdminBundle:Page:sidebar.html.twig');
    }

    public function rightsErrorAction()
    {
        return $this->render('BloggerAdminBundle:Page:error.html.twig');
    }

}