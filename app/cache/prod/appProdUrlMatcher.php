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

            if (0 === strpos($pathinfo, '/admin/create')) {
                // BloggerAdminBundle_create_new_post
                if ($pathinfo === '/admin/create') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_BloggerAdminBundle_create_new_post;
                    }

                    return array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\PostController::addPostAction',  '_route' => 'BloggerAdminBundle_create_new_post',);
                }
                not_BloggerAdminBundle_create_new_post:

                // BloggerAdminBundle_save_new_post
                if ($pathinfo === '/admin/create/save') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_BloggerAdminBundle_save_new_post;
                    }

                    return array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\PostController::submitCreatingAction',  '_route' => 'BloggerAdminBundle_save_new_post',);
                }
                not_BloggerAdminBundle_save_new_post:

            }

            // BloggerAdminBundle_delete_post
            if (0 === strpos($pathinfo, '/admin/deleting') && preg_match('#^/admin/deleting/(?P<blogId>\\d+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_BloggerAdminBundle_delete_post;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'BloggerAdminBundle_delete_post')), array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\PostController::deleteAction',));
            }
            not_BloggerAdminBundle_delete_post:

            if (0 === strpos($pathinfo, '/admin/managing-tags')) {
                // BloggerAdminBundle_edit_tags
                if ($pathinfo === '/admin/managing-tags') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_BloggerAdminBundle_edit_tags;
                    }

                    return array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\TagController::managingTagsAction',  '_route' => 'BloggerAdminBundle_edit_tags',);
                }
                not_BloggerAdminBundle_edit_tags:

                // BloggerAdminBundle_edit_concrete_tag
                if (preg_match('#^/admin/managing\\-tags/(?P<tagId>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_BloggerAdminBundle_edit_concrete_tag;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'BloggerAdminBundle_edit_concrete_tag')), array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\TagController::editTagAction',));
                }
                not_BloggerAdminBundle_edit_concrete_tag:

                // BloggerAdminBundle_submitTagEdition
                if (0 === strpos($pathinfo, '/admin/managing-tags/submit') && preg_match('#^/admin/managing\\-tags/submit/(?P<tagId>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_BloggerAdminBundle_submitTagEdition;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'BloggerAdminBundle_submitTagEdition')), array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\TagController::submitEditionAction',));
                }
                not_BloggerAdminBundle_submitTagEdition:

            }

            // BloggerAdminBundle_get_rights_error
            if ($pathinfo === '/admin/err') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_BloggerAdminBundle_get_rights_error;
                }

                return array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\PageController::rightsErrorAction',  '_route' => 'BloggerAdminBundle_get_rights_error',);
            }
            not_BloggerAdminBundle_get_rights_error:

            if (0 === strpos($pathinfo, '/admin/managing-users-info')) {
                // BloggerAdminBundle_edit_users_info
                if ($pathinfo === '/admin/managing-users-info') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_BloggerAdminBundle_edit_users_info;
                    }

                    return array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\UserController::managingUsersInfoAction',  '_route' => 'BloggerAdminBundle_edit_users_info',);
                }
                not_BloggerAdminBundle_edit_users_info:

                // BloggerAdminBundle_edit_info_of_concrete_user
                if (preg_match('#^/admin/managing\\-users\\-info/(?P<userId>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_BloggerAdminBundle_edit_info_of_concrete_user;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'BloggerAdminBundle_edit_info_of_concrete_user')), array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\UserController::editUserInfoAction',));
                }
                not_BloggerAdminBundle_edit_info_of_concrete_user:

                // BloggerAdminBundle_submitUserInfoEdition
                if (0 === strpos($pathinfo, '/admin/managing-users-info/submit') && preg_match('#^/admin/managing\\-users\\-info/submit/(?P<userId>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_BloggerAdminBundle_submitUserInfoEdition;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'BloggerAdminBundle_submitUserInfoEdition')), array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\UserController::submitEditionAction',));
                }
                not_BloggerAdminBundle_submitUserInfoEdition:

            }

            if (0 === strpos($pathinfo, '/admin/add-new-user')) {
                // BloggerAdminBundle_add_new_user
                if ($pathinfo === '/admin/add-new-user') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_BloggerAdminBundle_add_new_user;
                    }

                    return array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\UserController::addUserAction',  '_route' => 'BloggerAdminBundle_add_new_user',);
                }
                not_BloggerAdminBundle_add_new_user:

                // BloggerAdminBundle_submit_adding
                if ($pathinfo === '/admin/add-new-user/saving') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_BloggerAdminBundle_submit_adding;
                    }

                    return array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\UserController::submitAddingAction',  '_route' => 'BloggerAdminBundle_submit_adding',);
                }
                not_BloggerAdminBundle_submit_adding:

            }

            if (0 === strpos($pathinfo, '/admin/managing-categories')) {
                // BloggerAdminBundle_edit_categories
                if ($pathinfo === '/admin/managing-categories') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_BloggerAdminBundle_edit_categories;
                    }

                    return array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\CategoryController::managingCategoriesAction',  '_route' => 'BloggerAdminBundle_edit_categories',);
                }
                not_BloggerAdminBundle_edit_categories:

                // BloggerAdminBundle_edit_concrete_category
                if (preg_match('#^/admin/managing\\-categories/(?P<categoryId>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_BloggerAdminBundle_edit_concrete_category;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'BloggerAdminBundle_edit_concrete_category')), array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\CategoryController::editCategoryAction',));
                }
                not_BloggerAdminBundle_edit_concrete_category:

                // BloggerAdminBundle_submitCategoryEdition
                if (0 === strpos($pathinfo, '/admin/managing-categories/submit') && preg_match('#^/admin/managing\\-categories/submit/(?P<categoryId>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_BloggerAdminBundle_submitCategoryEdition;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'BloggerAdminBundle_submitCategoryEdition')), array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\CategoryController::submitEditionAction',));
                }
                not_BloggerAdminBundle_submitCategoryEdition:

                // BloggerAdminBundle_delete_category
                if (0 === strpos($pathinfo, '/admin/managing-categories/deleting') && preg_match('#^/admin/managing\\-categories/deleting/(?P<categoryId>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_BloggerAdminBundle_delete_category;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'BloggerAdminBundle_delete_category')), array (  '_controller' => 'Blogger\\AdminBundle\\Controller\\CategoryController::deleteAction',));
                }
                not_BloggerAdminBundle_delete_category:

            }

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
