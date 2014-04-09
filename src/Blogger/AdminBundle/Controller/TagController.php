<?php
/**
 * Created by PhpStorm.
 * User: BARIK
 * Date: 02.04.14
 * Time: 16:00
 */

namespace Blogger\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Blogger\AdminBundle\Form\EditTagType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TagController extends Controller
{

    public function managingTagsAction()
    {
        $em = $this->getDoctrine()
            ->getManager();

        $tags = $em->getRepository('BloggerBlogBundle:Tag')
            ->getTags();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $tags,
            $this->get('request')->query->get('page', 1)/*page number*/,
            5/*limit per page*/
        );

        return $this->render('BloggerAdminBundle:Tag:index.html.twig', array(
            'pagination' => $pagination
        ));
    }

    public function editTagAction($tagId)
    {
        $em = $this->getDoctrine()->getManager();

        $tag = $em->getRepository('BloggerBlogBundle:Tag')->find($tagId);

        if (!$tag) {
            throw $this->createNotFoundException('Unable to find tag.');
        }

        return $this->render('BloggerAdminBundle:Tag:editTag.html.twig', array(
            'tag' => $tag
        ));
    }

    public function editAction($tagId)
    {
        $em = $this->getDoctrine()->getManager();

        $tag = $em->getRepository('BloggerBlogBundle:Tag')->find($tagId);

        if (!$tag) {
            throw $this->createNotFoundException('Unable to find tag.');
        }
        $form = $this->createForm(new EditTagType(), $tag);

        return $this->render('BloggerAdminBundle:Tag:form.html.twig', array(
            'form' => $form->createView(),
            'tag' => $tag
        ));
    }

    public function submitEditionAction(Request $request, $tagId)
    {
        $em = $this->getDoctrine()
            ->getManager();
        $tag = $em->getRepository('BloggerBlogBundle:Tag')->find($tagId);

        $form  = $this->createForm(new EditTagType(), $tag);
        $form->submit($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()
                ->getManager();

            $isUnique = $em->getRepository('BloggerBlogBundle:Tag')->isTagUnique($tag->getName(), $tag->getSlug(), $tagId);

            if( $isUnique )
            {
                $em->persist($tag);
                $em->flush();

                return $this->redirect($this->generateUrl('BloggerAdminBundle_edit_tags'));
            }


            $this->get('session')->getFlashBag()
                ->set('blogger-notice', 'Tag with this name/slug already exists!!!');

            return $this->redirect($this->generateUrl('BloggerAdminBundle_edit_concrete_tag', array('tagId'=>$tagId)));
        }

        return $this->render('BloggerAdminBundle:Post:form.html.twig', array(
            'tag' => $tag,
            'form' => $form->createView()
        ));
    }
} 