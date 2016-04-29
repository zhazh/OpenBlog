<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display('User:login');
        //$this->display(T('User/login'));
    }
}