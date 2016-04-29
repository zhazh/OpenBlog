<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends Controller {
    public function index(){
        if(session('?user')){
            $this->display();
        }else{
            $this->redirect('User/login');
        }
    }
}