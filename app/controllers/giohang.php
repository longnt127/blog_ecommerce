<?php
    class giohang extends DController{
        
        public function __construct(){
            $data = array();
            parent::__construct();
        }
        public function index(){
             $this->giohang();
        }
        public function giohang(){
            Session::init();
            $table = 'tbl_category_product';
            $table_post = 'tbl_category_post';
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category_home($table);
            $data['category_post'] = $categorymodel->categorypost_home($table_post);
            $this->load->view('header', $data);
            //$this->load->view('slider');
            $this->load->view('cart');
            $this->load->view('footer');
        }
        public function dathang(){
            Session::init();
            $table_order = "tbl_order";
            $table_order_details = "tbl_order_details";
            $ordermodel = $this->load->model('ordermodel');
            $name = $_POST['name'];
            $sodienthoai = $_POST['sodienthoai'];
            $email = $_POST['email'];
            $noidung = $_POST['noidung'];
            $diachi = $_POST['diachi'];
            $order_code = rand(0,9999);
            date_default_timezone_set('asia/ho_chi_minh');
            $date = date("d/m/Y");
            $hour = date("h:i:sa");
            $order_date = $date.$hour;
            $data_order = array(
                'order_status' => 0,
                'order_code' => $order_code,
                'order_date' => $date. ' '.$hour
            );
            $result_order = $ordermodel->insert_order($table_order, $data_order);

            if(Session::get("shopping_cart")==true){
                foreach(Session::get("shopping_cart") as $key => $value){
                    $data_details = array(
                        'order_code' => $order_code,
                        'product_id' => $value['product_id'],
                        'product_quantity' => $value['product_quantity'],
                        'name' => $name,
                        'sodienthoai' => $sodienthoai,
                        'email' => $email,
                        'noidung' => $noidung,
                        'diachi' => $diachi
                    );
                    $result_order_details = $ordermodel->insert_order_details( $table_order_details, $data_details);
                }
                unset($_SESSION["shopping_cart"]);
            }
            if($result_order_details){
                $message['msg'] = "Đặ hàng thành công";
                header('Location:'. BASE_URL ."giohang?msg=". urlencode(serialize($message)));
            }
            
        }
        public function themgiohang(){
            Session::init();
            //Session::destroy();
           
            if(isset($_SESSION["shopping_cart"])){
                $available = 0;
                foreach($_SESSION["shopping_cart"] as $key => $value){
                    if($_SESSION["shopping_cart"][$key]['product_id'] == $_POST['product_id']){
                        $available++;
                        $_SESSION["shopping_cart"][$key]['product_quantity'] = $_SESSION["shopping_cart"][$key]['product_quantity']+$_POST['product_quantity'];
                    }
                }

                if($available == 0){
                    $item = array(
                        'product_id' => $_POST["product_id"],
                        'product_tittle' => $_POST["product_tittle"],
                        'product_price' => $_POST["product_price"],
                        'product_image' => $_POST["product_image"],
                        'product_quantity' => $_POST["product_quantity"]
                    );
                    $_SESSION["shopping_cart"][] = $item;
                }
                // foreach($_SESSION["shopping_cart"] as $key => $value){
                //     if($_SESSION["shopping_cart"][$key]['product_id'] == $_POST['product_id']){
                //         $available++;
                //         $_SESSION["shopping_cart"][$key]['product_quantity'] = $_SESSION["shopping_cart"][$key]['product_quantity'] + $_POST['product_quantity'];
                //     }
                // }
            }else{
                $item = array(
                    'product_id' => $_POST['product_id'],
                    'product_tittle' => $_POST['product_tittle'],
                    'product_price' => $_POST['product_price'],
                    'product_image' => $_POST['product_image'],
                    'product_quantity' => $_POST['product_quantity']

                );
                $_SESSION["shopping_cart"][] = $item;
               
            }
            header("Location:". BASE_URL .'giohang');
         }
        
        
        

        
    }
?>