<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function checkLogin(){
        if(isset($_POST['userEmail'])) {
            $email = $_POST['userEmail'];
            $pwd = md5($_POST['userPasswd']);
            
            $user = M("user");
      		$data = $user->where("email = '$email' and passwd='$pwd'")->find();
            if($data){
                cookie("username",$data['name']);
                $this->success("登录成功");
            }else{
                $this->error("用户名或密码错误");
            }
            
        }else{
            $this->error('非法登录');
        }
    }
}