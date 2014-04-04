<?php
/**
 * Created by PhpStorm.
 * User: BARIK
 * Date: 03.04.14
 * Time: 17:25
 */

namespace Blogger\AdminBundle\Controller;

use Blogger\AdminBundle\Form\EditUserInfoType;

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
            'user' => $user
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

            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('BloggerAdminBundle_edit_users_info'));
        }

        return $this->render('BloggerAdminBundle:Post:form.html.twig', array(
            'user' => $user,
            'form' => $form->createView()
        ));
    }
} 