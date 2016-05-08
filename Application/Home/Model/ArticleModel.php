<?php
namespace Home\Model;
use Think\Model;
class ArticleModel extends Model {
    
    protected $insertFields = array('user_id','content','image_id_list','ref_article_id','post_time');
    protected $updateFields = array('content','image_id_list');
}