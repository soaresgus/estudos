<?php

    namespace App\Controllers;

    use NF\Controller\Action;
    use NF\Model\Container;

    class IndexController extends Action
    {

        public function index()
        {
            $this->render('index', 'layout');
        }
        
    }

?>