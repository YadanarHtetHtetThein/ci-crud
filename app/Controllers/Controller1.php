<?php
    namespace App\Controllers;
    use CodeIgniter\Controller;
    class Controller1 extends Controller{
        // function __construct(){
        //     // parent() __construct();
        //     $this->load->model(('model1'));
        // }
        function index(){
            // $data['test'] = $this->model1->returnHello();
            // // echo $data;
            // $this->load->view('view1',$data);
            $data= "Hello Controller";
            return view('view1', ['data' => $data]);
        }
    }
?>