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

        if($this->Session->read('role_id') == 5) {
            //Lấy ra thông tin 10 order mới nhất
            $this->paginate = array('limit' => 10, 'order' => 'Order.id DESC');
            $Order = $this->paginate('Order');
            $this->set('Order', $Order);

            //Đếm các order trong hệ thống
            $order = new Order();
            $order_count = $this->Order->find('count');
            $order_success_count = $this->Order->find('count', array('conditions' => array('payment_status' => 1)));
            $this->set('order_count', $order_count);
            $this->set('order_success_count', $order_success_count);

            //Đếm số order trong ngày
            $currentDate = date('Y-m-d');
            $order_date_count = $this->Order->find('count', array('conditions' => array('payment_status' => 1,
                                                                                        'Order.modified >= ' => $currentDate . ' 00:00:00',
                                                                                        'Order.modified <='  => $currentDate . ' 23:59:59')));
            $this->set('order_date_count', $order_date_count);

            //Tổng doanh thu kiếm được
            $order_total = $this->Order->find('all', array(
                'fields'        =>  array('SUM(total_amount) as total'),
                'conditions'    =>  array('payment_status' => 1)));
            $this->set('order_total', $order_total[0][0]['total']);

            //Tính tổng doanh thu theo năm
            $currentYear = date('Y');
            $order_total_year = $this->Order->find('all', array(
                'fields'        =>  array('SUM(total_amount) as total'),
                'conditions'    =>  array('payment_status' => 1,
                                          'YEAR(Order.modified)' => $currentYear)));
            $this->set('order_total_year', $order_total_year[0][0]['total']);

            //Tính tổng doanh thu theo tháng
            $currentYear = date('Y');
            $currenMonth = date('m');
            $order_total_month = $this->Order->find('all', array(
                'fields'        =>  array('SUM(total_amount) as total'),
                'conditions'    =>  array('payment_status' => 1,
                                          'YEAR(Order.modified)'  => $currentYear,
                                          'MONTH(Order.modified)' => $currenMonth)));
            $this->set('order_total_month', $order_total_month[0][0]['total']);
        }else{
            $this->set('Order', array());
            $this->set('order_count', null);
            $this->set('order_success_count', null);
            $this->set('order_date_count', null);
            $this->set('order_total', null);
            $this->set('order_total_year', null);
            $this->set('order_total_month', null);
        }


        
    }

    public function error_404()
    {

    }

    public function error_pemission()
    {

    }

}
