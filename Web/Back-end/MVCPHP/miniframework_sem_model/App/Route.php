<?php

    namespace App;

    use NF\Init\Bootstrap;

    class Route extends Bootstrap
    {
        //Iniciando rota e definindo o seu controlador
        protected function initRoutes() 
        {
            $routes['home'] = [
                'route' => '/',
                'controller' => 'indexController',
                'action' => 'index'
            ];

            $this->setRoutes($routes);
        }
    }

?>