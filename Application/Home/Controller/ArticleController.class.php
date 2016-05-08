<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller {
    public function index(){
        $this->display();
    }
    
    // 新增微博
    // value:json，格式：'{"content":"aaaa","image_id_list":"1,3,9","ref_article_id":"0"}'
    public function add($value){
        if(IS_AJAX){
            $return_value=array('status'=>0, 'message'=>'发布失败', 'article_id'=>'0');
            if(session('?user')){
                $cond=json_decode($value,true);
                if(!empty($cond)){
                    $at_content=null;
                    $at_image_id_list=null;
                    $at_ref_article_id=null;
                    
                    if(array_key_exists('content',$cond)){
                        $at_content = $cond['content'];
                    }
                    
                    if(array_key_exists('image_id_list',$cond)){
                        $at_image_id_list=$cond['image_id_list'];
                    }
                    
                    if(array_key_exists('ref_article_id',$cond)){
                        $at_ref_article_id=$cond['ref_article_id'];
                    }
                    
                    if(!empty($at_content)){
                        $data['user_id']=session('user.id');
                        $data['content']=$at_content;
                        $data['image_id_list']=$at_image_id_list;
                        $data['ref_article_id']=$at_ref_article_id;
                        $data['post_time']=date("Y-m-d H:i:s");
                
                        $Article=D('Article');
                
                        if ($Article->create($data)) {
                            if ($result=$Article->add()) {
                                // insert ok.
                                $data['id'] = $result;
                                $return_value['status']=1;
                                $return_value['message']='发布成功';
                                $return_value['article_id']=$data['id'];
                            }
                        }   
                    }
                }
            }
            return $this->ajaxReturn($return_value,"json");
        }
    }
}