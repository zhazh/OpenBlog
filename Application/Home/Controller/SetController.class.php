<?php
namespace Home\Controller;
use Think\Controller;
class SetController extends Controller {
    
    //用户设置首页
    public function index(){
        if(session('?user')){
            $this->display();
        }else{
            $this->redirect('Home/index');
        }
    }
    
    //用户修改头像
    public function logo(){
        if(session('?user')){
            $this->display();
        }else{
            $this->redirect('Home/index');
        }
    }
}