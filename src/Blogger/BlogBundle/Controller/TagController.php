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

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->getPostsOnTag($tag->getId());

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $this->render('BloggerBlogBundle:Page:tag.html.twig', array(
            'blogs'      => $blog,
            'tags' => $tag
        ));
    }
} 