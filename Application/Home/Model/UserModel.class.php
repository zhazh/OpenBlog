<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
    
    protected $insertFields = array('name','passwd','email','image_id','create_time');
    protected $updateFields = array('name','passwd','email','image_id');
    
    /*
     * 如果存在返回true，反之返回false；
     * 如果存在，用户信息存放在$user中
     */
    public function exist($option,&$user){
        $user=$this->where($option)->find();
        if(empty($user)){
            return false;
        }else{
            return true;
        }
    }
    
    public function getUserBy($field,$value){
        $cond=array("$field"=>"$value");
        $user=M('User');
        return $user->where($cond)->find();
    }
}