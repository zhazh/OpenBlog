<?php
namespace Home\Controller;
use Think\Controller;

class UserController extends Controller {
        
    public function test(){
        $cond=json_decode('{"type":"1","value":{"email":"zhazh2015@163.com"}}',true);
        dump($cond['type']);
    }
    
    // 用户首页
    public function index($username){
        
        $userinfo=D('user')->getUserBy('name',$username);
        if(!empty($userinfo)){
            $user_id=$userinfo['id'];
            $article=D('article');
            $count = $article->where("user_id=$user_id")->count();
            $Page = new \Think\Page($count,10);
            $Page->setConfig('header','条微博');
            $show = $Page->show();
            $data = $article->where("user_id=$user_id")->order('post_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
            
            $this->assign('articles',$data);
            $this->assign('userinfo',$userinfo);
            $this->assign('page',$show);
            $this->display();
        }else{
            $this->redirect('Home/index');
        }
    }
    
    public function login(){
        //用户登录
        if(!empty($_COOKIE['user_auth'])){
            $user_auth=cookie('user_auth');
            if(!empty($user_auth['email']) and !empty($user_auth['passwd'])){
                $User = D('User');
                if($User->exist($user_auth,$login_user)){
                    session("user",$login_user);
                    $this->redirect('Home/index');
                }
            }
            $this->display();
        }else{
            if(isset($_POST['user_email']) 
                    and isset($_POST['user_password'])){       
            
                $email=I('post.user_email');
                $passwd=md5(I('post.user_password'));
                $User=D('User');
            
                if($User->exist(array('email'=>$email,
                                'passwd'=>$passwd),$data)){
                    if(trim(I('post.user_auto'))=='auto') {
                        $expr_time=2600*24*14;
                        cookie('user_auth',array('email'=>$data['email'],'passwd'=>$data['passwd']),$expr_time);
                    } 
                    session("user",$data);
                    $this->redirect('Home/index');
                }else{
                    $this->assign('message','用户名或者密码错误');
                }
            }
            $this->display();   
        }
    }
    
    /*
     * value:json.{"type":"0","value":{"email":"zhazh2015@163.com"}}
     */
    public function check($value=''){

        if(IS_AJAX){
            $User=D('User');
            $data=array('status'=>0, 'message'=>'OK');
            $cond=json_decode($value,true);
            if($cond['type']==1){
                //查找用户是否存在
                if($cond['value']){
                    if(!array_key_exists('name',$cond['value']) && !array_key_exists('email',$cond['value'])){
                        $data['status']=1;
                        $data['message']='请求格式不正确[value]';
                    }else{
                        if($User->exist($cond['value'],$checked_user)){
                            $data['status']=1;
                            $data['message']='已注册';
                        }   
                    }

                }else{
                    $data['status']=1;
                    $data['message']='请求格式不正确[value]';
                }
            }else if($cond['type']==2){
                //验证码
                $verify = new \Think\Verify();
                if(!$verify->check($cond['value']['code'])){
                    $data['status']=1;
                    $data['message']='验证码不正确';
                }
            }else{
                $data['status']=1;
                $data['message']='请求格式不正确[type]';
            }
            
            return $this->ajaxReturn($data,"json");
        }
    }
    
    public function verifycode(){
        $config = array(
            'fontSize'    =>    60,    // 验证码字体大小
            'length'      =>    3,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
    
    public function logout(){
        cookie('user_auth',null);
        session('user',null);
        $this->redirect('User/login');
    }
    
    public function reg(){
        
        if(isset($_POST['user_name']) 
            && isset($_POST['user_email']) 
            && isset($_POST['user_passwd'])){
               
            $user = D('user');
            $data['name'] = I('post.user_name');
            $data['passwd'] = md5(I('post.user_passwd'));
            $data['email'] = I('post.user_email');
            $data['create_time'] = date("Y-m-d H:i:s");
            
            if($user->create($data)){
                if($result = $user->add()){
                    // insert ok.
                    $reg_ok = true;
                    $data['id'] = $result;
                    $data['image_id']=null;
                    session("user",$data);
                    $this->redirect('Home/index');
                }
            }
            $this->assign('message','注册发生错误！');
        }
        $this->display();
    }
    
    //用户忘记密码
    public function forgot(){
        $this->display();
    }
}