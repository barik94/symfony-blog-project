<?php
/**
 * Created by PhpStorm.
 * User: BARIK
 * Date: 26.03.14
 * Time: 23:17
 */

namespace Blogger\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()
            ->getEntityManager();

        $blogs = $em->getRepository('BloggerBlogBundle:Blog')
            ->getLatestBlogs();

        return $this->render('BloggerAdminBundle:Page:index.html.twig', array(
            'blogs' => $blogs,
        ));
    }
}