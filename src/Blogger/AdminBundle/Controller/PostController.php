<?php
/**
 * Created by PhpStorm.
 * User: BARIK
 * Date: 29.03.14
 * Time: 15:54
 */

namespace Blogger\AdminBundle\Controller;

use Blogger\BlogBundle\Entity\Blog;
use Blogger\AdminBundle\Form\EditPostType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostController extends Controller
{
    public function editPostAction($blog_id)
    {
        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($blog_id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }
        $form = $this->createForm(new EditPostType(), $blog);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                // Perform some action, such as sending an email

                // Redirect - This is important to prevent users re-posting
                // the form if they refresh the page
                return $this->redirect($this->generateUrl('BloggerAdminBundle_edit_post', array(
                    'blog_id' => $blog->getId()
                )));
            }
        }

        return $this->render('BloggerAdminBundle:Post:editPost.html.twig', array(
            'form' => $form->createView(),
            'blog' => $blog
        ));
    }
}