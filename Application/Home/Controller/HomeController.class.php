<?php
namespace Home\Controller;
use Think\Controller;
class HomeController extends Controller {

    public function index(){
        //登录后主页
        if(session('?user')){
            $this->display();
        }else{
            $this->redirect('User/login');   
        }
    }
}