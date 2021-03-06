<?php

namespace Blogger\AdminBundle\Controller;

use Blogger\AdminBundle\Form\EditUserInfoType;
use Blogger\BlogBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller{

    public function managingUsersInfoAction()
    {
        $em = $this->getDoctrine()
            ->getManager();

        $users = $em->getRepository('BloggerBlogBundle:User')
            ->getUsersList();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $users,
            $this->get('request')->query->get('page', 1)/*page number*/,
            5/*limit per page*/
        );

        return $this->render('BloggerAdminBundle:User:index.html.twig', array(
            'pagination' => $pagination
        ));
    }

    public function editUserInfoAction($userId)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('BloggerBlogBundle:User')->find($userId);

        if (!$user) {
            throw $this->createNotFoundException('Unable to find tag.');
        }

        return $this->render('BloggerAdminBundle:User:editUserInfo.html.twig', array(
            'user' => $user
        ));
    }

    public function editAction($userId)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('BloggerBlogBundle:User')->find($userId);

        if (!$user) {
            throw $this->createNotFoundException('Unable to find tag.');
        }
        $form = $this->createForm(new EditUserInfoType(), $user);

        return $this->render('BloggerAdminBundle:User:form.html.twig', array(
            'form' => $form->createView(),
            'user' => $user,
            'isAdding' => false
        ));
    }

    public function  submitEditionAction(Request $request, $userId)
    {
        $em = $this->getDoctrine()
            ->getManager();
        $user = $em->getRepository('BloggerBlogBundle:User')->find($userId);

        $form  = $this->createForm(new EditUserInfoType(), $user);
        $form->submit($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()
                ->getManager();

            if(!$request->get('password')) {
                $encoder = $this->container->get('blogger.blog.sha256salted_encoder');
                $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
                $user->setPassword($password);
            }

            $isUnique = $em->getRepository('BloggerBlogBundle:User')->isUserUnique($user->getUsername(), $user->getEmail(), $userId);

            if( $isUnique )
            {
                $em->persist($user);
                $em->flush();

                return $this->redirect($this->generateUrl('BloggerAdminBundle_edit_users_info'));
            }

            $this->get('session')->getFlashBag()
                ->set('blogger-notice', 'User with this name/email already exists!!!');

            return $this->redirect($this->generateUrl('BloggerAdminBundle_edit_info_of_concrete_user', array('userId'=>$userId)));
        }

        return $this->render('BloggerAdminBundle:User:form.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
            'isAdding' => false
        ));
    }

    public function addUserAction()
    {
        return $this->render('BloggerAdminBundle:User:addUser.html.twig');
    }

    public function addAction()
    {
        $user = new User();

        $form = $this->createForm(new EditUserInfoType(), $user);

        return $this->render('BloggerAdminBundle:User:form.html.twig', array(
            'form' => $form->createView(),
            'isAdding' => true
        ));
    }

    public function submitAddingAction(Request $request)
    {
        $user = new User();

        $form  = $this->createForm(new EditUserInfoType(), $user);
        $form->submit($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()
                ->getManager();

            if(!$request->get('password')) {
                $encoder = $this->container->get('blogger.blog.sha256salted_encoder');
                $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
                $user->setPassword($password);
            }

            $isUnique = $em->getRepository('BloggerBlogBundle:User')->isUserUnique($user->getUsername(), $user->getEmail());

            if( $isUnique )
            {
                $em->persist($user);
                $em->flush();

                return $this->redirect($this->generateUrl('BloggerAdminBundle_homepage'));
            }

            $this->get('session')->getFlashBag()
                ->set('blogger-notice', 'User with this name/email already exists!!!');

            return $this->redirect($this->generateUrl('BloggerAdminBundle_add_new_user'));
        }

        return $this->render('BloggerAdminBundle:User:form.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
            'isAdding' => true
        ));
    }

    public function deleteAction($userId)
    {
        $em =  $this->getDoctrine()
            ->getManager();

        $user = $em->getRepository('BloggerBlogBundle:User')->find($userId);

        $em->remove($user);

        $em->flush();

        return $this->redirect($this->generateUrl('BloggerAdminBundle_homepage'));
    }
} 