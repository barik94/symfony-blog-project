<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

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

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
