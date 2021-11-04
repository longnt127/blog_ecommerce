<?php
    class order extends DController{
        public function __construct(){
            Session::checkSession();
            parent:: __construct();
        }
        public function index(){
           $this->order();
        }
        public function order(){
            $table_order = 'tbl_order';
            $ordermodel = $this->load->model('ordermodel');
            $data['order'] = $ordermodel->list_order($table_order);

            $this->load->view('cpanel/header');
            $this->load->view('cpanel/menu');
            $this->load->view('cpanel/order/order', $data);
            $this->load->view('cpanel/footer');
        }
        
    }
?>