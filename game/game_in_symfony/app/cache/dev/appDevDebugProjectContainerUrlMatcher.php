<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevDebugProjectContainerUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
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

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        if (0 === strpos($pathinfo, '/wargame')) {
            // wargame_login
            if ($pathinfo === '/wargame') {
                return array (  '_controller' => 'AppBundle\\Controller\\GameController::loginAction',  '_route' => 'wargame_login',);
            }

            if (0 === strpos($pathinfo, '/wargame/register')) {
                // wargame_register
                if ($pathinfo === '/wargame/register') {
                    return array (  '_controller' => 'AppBundle\\Controller\\GameController::registerAction',  '_route' => 'wargame_register',);
                }

                // wargame_do_register
                if ($pathinfo === '/wargame/registerDo') {
                    return array (  '_controller' => 'AppBundle\\Controller\\GameController::registerDoAction',  '_route' => 'wargame_do_register',);
                }

            }

            // wargame_do_login
            if ($pathinfo === '/wargame/login') {
                return array (  '_controller' => 'AppBundle\\Controller\\GameController::doLoginAction',  '_route' => 'wargame_do_login',);
            }

            // wargame_profile
            if ($pathinfo === '/wargame/profile') {
                return array (  '_controller' => 'AppBundle\\Controller\\GameController::profileAction',  '_route' => 'wargame_profile',);
            }

            if (0 === strpos($pathinfo, '/wargame/create')) {
                // wargame_createMonster
                if ($pathinfo === '/wargame/createMonster') {
                    return array (  '_controller' => 'AppBundle\\Controller\\GameController::createMonsterAction',  '_route' => 'wargame_createMonster',);
                }

                // wargame_createAttack
                if ($pathinfo === '/wargame/createAttack') {
                    return array (  '_controller' => 'AppBundle\\Controller\\GameController::createAttackAction',  '_route' => 'wargame_createAttack',);
                }

            }

            if (0 === strpos($pathinfo, '/wargame/insert')) {
                // wargame_insertAttack
                if ($pathinfo === '/wargame/insertAttack') {
                    return array (  '_controller' => 'AppBundle\\Controller\\GameController::insertAttackAction',  '_route' => 'wargame_insertAttack',);
                }

                // wargame_insertMonster
                if ($pathinfo === '/wargame/insertMonster') {
                    return array (  '_controller' => 'AppBundle\\Controller\\GameController::insterMonsterAction',  '_route' => 'wargame_insertMonster',);
                }

            }

            // wargame_do_logout
            if ($pathinfo === '/wargame/logout') {
                return array (  '_controller' => 'AppBundle\\Controller\\GameController::logoutAction',  '_route' => 'wargame_do_logout',);
            }

            // wargame_healingShop
            if ($pathinfo === '/wargame/healingShop') {
                return array (  '_controller' => 'AppBundle\\Controller\\GameController::healingShopAction',  '_route' => 'wargame_healingShop',);
            }

            // wargame_buyHealth
            if ($pathinfo === '/wargame/buyHealth') {
                return array (  '_controller' => 'AppBundle\\Controller\\GameController::buyHealthAction',  '_route' => 'wargame_buyHealth',);
            }

            // wargame_attackShop
            if ($pathinfo === '/wargame/attackShop') {
                return array (  '_controller' => 'AppBundle\\Controller\\GameController::attackShopAction',  '_route' => 'wargame_attackShop',);
            }

            // wargame_buyAttack
            if ($pathinfo === '/wargame/buyAttack') {
                return array (  '_controller' => 'AppBundle\\Controller\\GameController::buyAttackAction',  '_route' => 'wargame_buyAttack',);
            }

            // wargame_warArea
            if ($pathinfo === '/wargame/warArea') {
                return array (  '_controller' => 'AppBundle\\Controller\\GameController::warAreaAction',  '_route' => 'wargame_warArea',);
            }

        }

        // app_lucky_apinumber
        if ($pathinfo === '/api/lucky/number') {
            return array (  '_controller' => 'AppBundle\\Controller\\LuckyController::apiNumberAction',  '_route' => 'app_lucky_apinumber',);
        }

        if (0 === strpos($pathinfo, '/game')) {
            // game_login
            if ($pathinfo === '/game') {
                return array (  '_controller' => 'AppBundle\\Controller\\LuckyController::loginAction',  '_route' => 'game_login',);
            }

            if (0 === strpos($pathinfo, '/game/register')) {
                // game_register
                if ($pathinfo === '/game/register') {
                    return array (  '_controller' => 'AppBundle\\Controller\\LuckyController::registerAction',  '_route' => 'game_register',);
                }

                // do_register
                if ($pathinfo === '/game/registerDo') {
                    return array (  '_controller' => 'AppBundle\\Controller\\LuckyController::registerDoAction',  '_route' => 'do_register',);
                }

            }

            // do_login
            if ($pathinfo === '/game/login') {
                return array (  '_controller' => 'AppBundle\\Controller\\LuckyController::doLoginAction',  '_route' => 'do_login',);
            }

            // game_profile
            if ($pathinfo === '/game/profile') {
                return array (  '_controller' => 'AppBundle\\Controller\\LuckyController::profileAction',  '_route' => 'game_profile',);
            }

            if (0 === strpos($pathinfo, '/game/create')) {
                // game_createMonster
                if ($pathinfo === '/game/createMonster') {
                    return array (  '_controller' => 'AppBundle\\Controller\\LuckyController::createMonsterAction',  '_route' => 'game_createMonster',);
                }

                // game_createAttack
                if ($pathinfo === '/game/createAttack') {
                    return array (  '_controller' => 'AppBundle\\Controller\\LuckyController::createAttackAction',  '_route' => 'game_createAttack',);
                }

            }

            if (0 === strpos($pathinfo, '/game/insert')) {
                // game_insertAttack
                if ($pathinfo === '/game/insertAttack') {
                    return array (  '_controller' => 'AppBundle\\Controller\\LuckyController::insertAttackAction',  '_route' => 'game_insertAttack',);
                }

                // game_insertMonster
                if ($pathinfo === '/game/insertMonster') {
                    return array (  '_controller' => 'AppBundle\\Controller\\LuckyController::insterMonsterAction',  '_route' => 'game_insertMonster',);
                }

            }

            // do_logout
            if ($pathinfo === '/game/logout') {
                return array (  '_controller' => 'AppBundle\\Controller\\LuckyController::logoutAction',  '_route' => 'do_logout',);
            }

            // game_healingShop
            if ($pathinfo === '/game/healingShop') {
                return array (  '_controller' => 'AppBundle\\Controller\\LuckyController::healingShopAction',  '_route' => 'game_healingShop',);
            }

            // game_buyHealth
            if ($pathinfo === '/game/buyHealth') {
                return array (  '_controller' => 'AppBundle\\Controller\\LuckyController::buyHealthAction',  '_route' => 'game_buyHealth',);
            }

            // game_attackShop
            if ($pathinfo === '/game/attackShop') {
                return array (  '_controller' => 'AppBundle\\Controller\\LuckyController::attackShopAction',  '_route' => 'game_attackShop',);
            }

            // game_buyAttack
            if ($pathinfo === '/game/buyAttack') {
                return array (  '_controller' => 'AppBundle\\Controller\\LuckyController::buyAttackAction',  '_route' => 'game_buyAttack',);
            }

            // game_warArea
            if ($pathinfo === '/game/warArea') {
                return array (  '_controller' => 'AppBundle\\Controller\\LuckyController::warAreaAction',  '_route' => 'game_warArea',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
