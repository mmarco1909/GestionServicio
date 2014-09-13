<?php

// src/SisVen/SistemaBundle/Listener/LoginListener.php

namespace SisVen\SistemaBundle\Listener;

use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;

class LoginListener {

    private $router, $rol = null;

    public function __construct(Router $router, $container) {
        $this->router = $router;
        $this->container = $container;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event) {
        $token = $event->getAuthenticationToken();
        $this->rol = $token->getRoles();
    }

    public function onKernelResponse(FilterResponseEvent $event) {
        if (null != $this->rol) {
            $ruta = $this->router->generate(
                        $this->container->getParameter('sisven.ruta_inicial'));           
            $event->setResponse(new RedirectResponse($ruta));
            
        }
    }

}
