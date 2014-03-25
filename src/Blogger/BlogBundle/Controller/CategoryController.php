<?php
/**
 * Created by PhpStorm.
 * User: BARIK
 * Date: 25.03.14
 * Time: 9:41
 */

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CategoryController extends Controller{

    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('BloggerBlogBundle:Category')->findBySlug($slug);

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->getPostsForCategory($category->getId());

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $this->render('BloggerBlogBundle:Page:category.html.twig', array(
            'blogs'      => $blog,
            'category' => $category
        ));
    }

}