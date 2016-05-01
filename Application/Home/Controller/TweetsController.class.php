<?php
namespace Home\Controller;
use Think\Controller;
class TweetsController extends Controller {
    //发表微博
    public function add(){
        $tweet = M('tweet');
        $data['tweet']=$_POST['new_tweet'];
        $data['user_id']=session('user.id');
        $data['ref_tweet_id']=0;
        $data['create_date']=date("Y-m-d H:i:s");
        if ($tweet->create($data)) {
            if ($result = $tweet->add()) {
                        // insert ok.
                        $data['id'] = $result;
            }
        }
        $this->display();
    }
}