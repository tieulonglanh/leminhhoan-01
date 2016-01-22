<?php

class HomeController extends AppController
{

    public $name = 'Home';
    public $uses = array('Order', 'OrderDetail');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/login');
        }
    }

    public function index()
    {


        
    }

    public function error_404()
    {

    }

    public function error_pemission()
    {

    }

}
