<?php
/**
 * Created by PhpStorm.
 * User: BARIK
 * Date: 29.03.14
 * Time: 15:54
 */

namespace Blogger\AdminBundle\Controller;

use Blogger\AdminBundle\Form\EditPostType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class PostController extends Controller
{
    public function editAction($blog_id)
    {
        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($blog_id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }
        $form = $this->createForm(new EditPostType(), $blog);

        return $this->render('BloggerAdminBundle:Post:form.html.twig', array(
            'form' => $form->createView(),
            'blog' => $blog
        ));
    }

    public function editPostAction($blog_id)
    {
        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($blog_id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $this->render('BloggerAdminBundle:Post:editPost.html.twig', array(
            'blog' => $blog
        ));
    }

    public function submitEditionAction( $blog_id)
    {
        $em = $this->getDoctrine()
            ->getManager();
        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($blog_id);

        //var_dump($request); die;
        $form  = $this->createForm(new EditPostType(), $blog);
        $form->submit($this->getRequest());

        if ($form->isValid()) {

            $em = $this->getDoctrine()
                ->getManager();

            $em->persist($blog);
            $em->getRepository('BloggerBlogBundle:Category')->getQuantityOfPostsInAllCategories();
            $em->flush();

            return $this->redirect($this->generateUrl('BloggerAdminBundle_homepage'));
        }

        return $this->render('BloggerAdminBundle:Post:form.html.twig', array(
            'blog' => $blog,
            'form' => $form->createView(),
        ));
    }
}