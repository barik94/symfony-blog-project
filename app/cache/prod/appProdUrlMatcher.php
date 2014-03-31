<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // BloggerBlogBundle_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_BloggerBlogBundle_homepage;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'BloggerBlogBundle_homepage');
            }

            return array (  '_controller' => 'Blogger\\BlogBundle\\Controller\\PageController::indexAction',  '_route' => 'BloggerBlogBundle_homepage',);
        }
        not_BloggerBlogBundle_homepage:

        // BloggerBlogBundle_about
        if ($pathinfo === '/about') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_BloggerBlogBundle_about;
            }

            return array (  '_controller' => 'Blogger\\BlogBundle\\Controller\\PageController::aboutAction',  '_route' => 'BloggerBlogBundle_about',);
        }
        not_BloggerBlogBundle_about:

        // BloggerBlogBundle_contact
        if ($pathinfo === '/contact') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_BloggerBlogBundle_contact;
            }

            return array (  '_controller' => 'Blogger\\BlogBundle\\Controller\\PageController::contactAction',  '_route' => 'BloggerBlogBundle_contact',);
        }
        not_BloggerBlogBundle_contact:

        // BloggerBlogBundle_blog_show
        if (preg_match('#^/(?P<id>\\d+)/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_BloggerBlogBundle_blog_show;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'BloggerBlogBundle_blog_show')), array (  '_controller' => 'Blogger\\BlogBundle\\Controller\\BlogController::showAction',));
        }
        not_BloggerBlogBundle_blog_show:

        if (0 === strpos($pathinfo, '/c')) {
            // BloggerBlogBundle_comment_create
            if (0 === strpos($pathinfo, '/comment') && preg_match('#^/comment/(?P<blog_id>\\d+)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_BloggerBlogBundle_comment_create;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'BloggerBlogBundle_comment_create')), array (  '_controller' => 'Blogger\\BlogBundle\\Controller\\CommentController::createAction',));
            }
            not_BloggerBlogBundle_comment_create:

            // BloggerBlogBundle_category_show
            if (0 === strpos($pathinfo, '/category') && preg_match('#^/category/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_BloggerBlogBundle_category_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'BloggerBlogBundle_category_show')), array (  '_controller' => 'Blogger\\BlogBundle\\Controller\\CategoryController::showAction',));
            }
            not_BloggerBlogBundle_category_show:

        }

        // BloggerBlogBundle_onTag_show
        if (0 === strpos($pathinfo, '/tag') && preg_match('#^/tag/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_BloggerBlogBundle_onTag_show;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'BloggerBlogBundle_onTag_show')), array (  '_controller' => 'Blogger\\BlogBundle\\Controller\\TagController::onTagAction',));
        }
        not_BloggerBlogBundle_onTag_show:

        if (0 === strpos($pathinfo, '/admin')) {
            // BloggerAdminBundle_homepage
            if (rtrim($pathinfo, '/') === '/admin') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_BloggerAdminBundle_homepage;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'BloggerAdminBundle_homepage');
                }

                return array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\PageController::indexAction',  '_route' => 'BloggerAdminBundle_homepage',);
            }
            not_BloggerAdminBundle_homepage:

            if (0 === strpos($pathinfo, '/admin/edit-post')) {
                // BloggerAdminBundle_edit_post
                if (preg_match('#^/admin/edit\\-post/(?P<blog_id>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_BloggerAdminBundle_edit_post;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'BloggerAdminBundle_edit_post')), array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\PostController::editPostAction',));
                }
                not_BloggerAdminBundle_edit_post:

                // BloggerAdminBundle_submitEdition
                if (0 === strpos($pathinfo, '/admin/edit-post/submit') && preg_match('#^/admin/edit\\-post/submit/(?P<blog_id>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_BloggerAdminBundle_submitEdition;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'BloggerAdminBundle_submitEdition')), array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\PostController::submitEditionAction',));
                }
                not_BloggerAdminBundle_submitEdition:

            }

            // BloggerAdminBundle_create_new_post
            if ($pathinfo === '/admin/create') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_BloggerAdminBundle_create_new_post;
                }

                return array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\PostController::createAction',  '_route' => 'BloggerAdminBundle_create_new_post',);
            }
            not_BloggerAdminBundle_create_new_post:

        }

        if (0 === strpos($pathinfo, '/log')) {
            // login
            if ($pathinfo === '/login') {
                return array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\SecurityController::autorizationAction',  '_route' => 'login',);
            }

            // logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'logout');
            }

            // login_check
            if ($pathinfo === '/login_check') {
                return array('_route' => 'login_check');
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
