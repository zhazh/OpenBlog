<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    /* 
     * 通过name获取user信息
     * 可以改进该函数更为通用。
     */
    protected function getUserInfoByName($username) {
        $user = M('user');
        if($user_info=$user->where("name='$username'")->find()){
            return $user_info;
        }else{
            return null;
        }
    }
    
    protected function getFllowInfoByUserId($userId){
        $Follow = M('follow');
        if($follow_info=$Follow->where("user_id=$userId")->getField('follow_user_id,follow_date')){
            return $follow_info;
        }else{
            return null;
        }
    }
    
    protected function getFllowedInfoByUserId($userId){
        $Follow = M('follow');
        if($follow_info=$Follow->where("follow_user_id=$userId")->getField('user_id,follow_date')){
            return $follow_info;
        }else{
            return null;
        }
    }
    
    /* 显示用户名为username的首页 */
    public function index($username){
        $user_data=$this->getUserInfoByName($username);
        if($user_data!=null){
            $user_id = $user_data["id"];
            $tweets = M('tweet');
            
            $count = $tweets->where("user_id=$user_id")->count();
            $Page = new \Think\Page($count,15);
            $Page->setConfig('header','条微博');
            $show = $Page->show();
            echo Sshow;
            $data = $tweets->where("user_id=$user_id")->order('create_date desc')->limit($Page->firstRow.','.$Page->listRows)->select();
            
            
            $follow_count=0;
            $followed_count=0;
            $tweet_count = $count;
            $follow_flag=2; //0:自己,1:已关注,2:未关注
            
            $follow_info=$this->getFllowInfoByUserId($user_id);
            $followed_info=$this->getFllowedInfoByUserId($user_id);
            
            if($follow_info!=null){
                $follow_count=$follow_info.count();
            }
            
            if($followed_info!=null){
                $followed_count=$followed_info.count();
            }
            
            if(session("user.id")==$user_id){
                $follow_flag=0;
            }else if(in_array($user_id,$this->getFllowInfoByUserId(session('user.id')))){
                $follow_flag=1;
            }else{
                $follow_flag=2;
            }
            
            $user_count = array("follow"=>$follow_count,
                                "followed"=>$followed_count,
                                "tweets"=>$tweet_count,
                                "follow_flag"=>$follow_flag);
            
            $this->assign('user_count', $user_count);
            $this->assign('user_tweets', $data);
            $this->assign('userinfo', $user_data);
            $this->assign('page', $show);
            $this->display();
        }else{
            $this->redirect("Member/index");
        }
    }
    
    /* 关注用户 */
    public function follow($user_id){
        if(IS_AJAX){
            $Follow = M('follow');
            $data['user_id']=session("user.id");
            $data['follow_user_id']=$user_id;
            $data['follow_date']=date("Y-m-d H:i:s");
            
            if ($Follow->create($data)) {
                if ($result = $Follow->add()) {
                        $this->ajaxReturn("关注成功");
                    }else{
                        $this->ajaxReturn("关注失败，插入失败");
                    }
                }else{
                    $this->ajaxReturn("关注失败，生成失败");
                }
        }
    }
    
    /* 用户登录 */
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
    
    /* 注册用户 */
    public function add(){
        if(isset($_POST['username']) 
                and isset($_POST['email']) 
                and isset($_POST['passwd'])){
                    
            $user = M('user');
            $data['name'] = $_POST['username'];
            $data['passwd'] = md5($_POST['passwd']);
            $data['email'] = $_POST['email'];
            $data['create_date'] = date("Y-m-d H:i:s");
            
            try{
                //捕获异常
                //可以使用配置异常处理页面来显示异常
                if ($user->create($data)) {
                    if ($result = $user->add()) {
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
            }catch(\Think\Exception $e){
                    $this->assign('message','注册用户出错');
                    $this->display('User/reg');
            }

        }else{
            $this->redirect('User/reg');
        }
    }
    
    /* 用户注销 */
    public function logout() {
        session('user',null);
        $this->redirect('User/login');
    }
}