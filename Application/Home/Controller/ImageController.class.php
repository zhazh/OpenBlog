<?php
namespace Home\Controller;
use Think\Controller;
class ImageController extends Controller {
    
    private $image_conifg=array(
        'maxSize'    =>    3145728,
        'rootPath'   =>    './Uploads/',
        'savePath'   =>    '',
        'saveName'   =>    array('uniqid',''),
        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
        'autoSub'    =>    true,
        'subName'    =>    array('date','Ymd'),
    );
    
    //图片上传
    public function upload(){
        if(!empty($_FILES)){
            //$photo=M('Image');   
            $upload = new \Think\Upload();
            $info = $upload->upload($image_conifg);
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功 获取上传文件信息
                foreach($info as $file){
                    echo $file['savepath'].$file['savename'];
                }
            }
        }else{
            echo 'not set photo';
        }
    }
}