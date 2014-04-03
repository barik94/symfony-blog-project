<?php
/**
 * Created by PhpStorm.
 * User: BARIK
 * Date: 29.03.14
 * Time: 15:54
 */

namespace Blogger\AdminBundle\Controller;

use Blogger\AdminBundle\Form\EditPostType;
use Blogger\BlogBundle\Entity\Blog;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
            'blog' => $blog,
            'isCreate' => false
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

    public function submitEditionAction($blog_id)
    {
        $em = $this->getDoctrine()
            ->getManager();
        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($blog_id);

        $form  = $this->createForm(new EditPostType(), $blog);
        $form->submit($this->getRequest());

        if ($form->isValid()) {

            $em = $this->getDoctrine()
                ->getManager();

            $em->persist($blog);
            $em->flush();

            $em->getRepository('BloggerBlogBundle:Category')->getQuantityOfPostsInAllCategories();
            $em->flush();

            return $this->redirect($this->generateUrl('BloggerAdminBundle_homepage'));
        }

        return $this->render('BloggerAdminBundle:Post:form.html.twig', array(
            'blog' => $blog,
            'form' => $form->createView(),
            'isCreate' => false
        ));
    }

    public function addPostAction()
    {
        return $this->render('BloggerAdminBundle:Post:addPost.html.twig');
    }

    public function createAction()
    {
        $blog = new Blog();

        $form = $this->createForm(new EditPostType(), $blog);

        return $this->render('BloggerAdminBundle:Post:form.html.twig', array(
            'form' => $form->createView(),
            'isCreate' => true
        ));
    }

    public function submitCreatingAction()
    {
        $blog = new Blog();

        $form  = $this->createForm(new EditPostType(), $blog);
        $form->submit($this->getRequest());

        if ($form->isValid()) {

            $em = $this->getDoctrine()
                ->getManager();
            $blog->setAuthor($this->getUser());
            $em->persist($blog);
            $em->flush();

            $em->getRepository('BloggerBlogBundle:Category')->getQuantityOfPostsInAllCategories();
            $em->flush();

            return $this->redirect($this->generateUrl('BloggerAdminBundle_homepage'));
        }

        return $this->render('BloggerAdminBundle:Post:form.html.twig', array(
            'blog' => $blog,
            'form' => $form->createView(),
            'isCreate' => true
        ));
    }

    public function deleteAction($blogId)
    {
        $em =  $this->getDoctrine()
            ->getManager();

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($blogId);

        $comments = $em->getRepository('BloggerBlogBundle:Comment')->getCommentsForBlog($blogId);

       foreach($comments as $comment )
       {
           $em->remove($comment);
           $em->flush();
       }

        $em->remove($blog);

        $em->flush();

        $em->getRepository('BloggerBlogBundle:Category')->getQuantityOfPostsInAllCategories();
        $em->flush();

        return $this->redirect($this->generateUrl('BloggerAdminBundle_homepage'));
    }
}