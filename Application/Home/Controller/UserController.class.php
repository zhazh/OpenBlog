<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    
    public function login(){
        if(isset($_POST['userEmail']) 
                and isset($_POST['userPasswd'])){
            $email = $_POST['userEmail'];
            $pwd = md5($_POST['userPasswd']);
            
            $user = M("user");
      		$data = $user->where("email = '$email' and passwd='$pwd'")->find();
            if($data){
                session("user",$data);
                $this->redirect('Member/index');
            }else{
                $this->assign('message','邮箱或者密码错误！');
                $this->display();
            }
        }else{
            $this->display();
        }
    }
    
    public function add(){
        if(isset($_POST['username']) 
                and isset($_POST['email']) 
                and isset($_POST['passwd'])){
                    
            $user = M('user');
            $data['name'] = $_POST['username'];
            $data['passwd'] = md5($_POST['passwd']);
            $data['email'] = $_POST['email'];
            $data['create_date'] = date("Y-m-d H:i:s");
            if ($user->create($data)) {
                $result = $user->add();
                if ($result) {
                    // insert ok.
                    $data['id'] = $result;
                    session("user",$data);
                    $this->redirect('Member/index');
                }else{
                    $this->assign('message','插入数据库出错');
                    $this->display('User/reg');
                }
            }else{
                $this->assign('message','生成模型数据出错！');
                $this->display('User/reg');
            }
        }else{
            $this->redirect('User/reg');
        }
    }
    
    public function logout() {
        session('user',null);
        $this->redirect('User/login');
    }
}