<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
    <title><?php echo ($userinfo["name"]); ?>的微博</title>    


        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="/OpenBlog/Public/css/open-blog.css">
    </head>
    
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo U('Member/index');?>">OpenBlog</a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            
    <ul class="nav navbar-nav">
    <li><a href="<?php echo U('Member/index');?>">首页</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
    <li>
        <button type="button" class="btn btn-default navbar-btn pull-left" data-toggle="modal" data-target="#tweet-editor-modal">
            <span class="glyphicon glyphicon-edit"></span>
        </button>
    </li>    
    <li>
        <?php if(is_array($_SESSION['user'])): $i = 0; $__LIST__ = $_SESSION['user'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($key) == "name"): ?><a href="<?php echo U('User/index', array('username'=>$vo));?>">
                    <span class="glyphicon glyphicon-user"></span>
                        <?php echo ($_SESSION['user']['name']); ?>
                </a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <ul class="dropdown-menu">
            <li><a href="">账号设置</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo U('User/logout');?>">退出</a></li>
        </ul>
    </li>
</ul>

                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </nav>
        
        <!--
        ==========================editor modal=================================
        ============================待改进=====================================
        -->
        <div id="tweet-editor-modal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content" role="document">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">发表微博</h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo U('Tweets/add');?>" method="post">
    <div class="form-group">
        <label for="tweet-editor" class="sr-only">写微博</label>
        <textarea id="tweet-editor" name="new_tweet" class="form-control member-tweet-editor" rows="5" placeholder="快来分享你的观点吧..."></textarea>
    </div>
                
    <div class="form-group">
        <label id="tweet-editor-counter">您还可以输入字数：250</label>
        <button type="submit" class="btn btn-primary  pull-right">发布</button>
    </div>
</form>
                        </div>
                        <!--
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        -->
                    </div>
                </div>
        </div>  
        
        <div class="container-fluid main-body">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="content-wrapper">
                        
    <div class="member-context-wrapper row">
        <div class="col-md-4">
            <div class="userinfo">
                <div class="row text-center tweet-boxing-heading">
                    <?php echo ($userinfo['name']); ?>
                </div>
                
                <div class="row">
                    <div class="col-md-4 text-center"><?php echo ($user_count["tweets"]); ?></div>
                    <div class="col-md-4 text-center"><?php echo ($user_count["follow"]); ?></div>
                    <div class="col-md-4 text-center"><?php echo ($user_count["followed"]); ?></div>
                </div>
                
                <div class="row">
                    <div class="col-md-4 text-center">博文</div>
                    <div class="col-md-4 text-center">关注</div>
                    <div class="col-md-4 text-center">粉丝</div>
                </div>
                <div class="row text-center">
                <?php if($user_count["follow_flag"] == 0): ?><button type="button" class="btn btn-primary" disabled>关注TA</button>
                <?php elseif($user_count["follow_flag"] == 1): ?>
                    <button type="button" class="btn btn-primary">取消关注</button>
                <?php else: ?>
                    <button type="button" class="btn btn-primary follow_button" url="<?php echo U('User/follow');?>" userid="<?php echo ($userinfo['id']); ?>">关注TA</button><?php endif; ?>
                    <div id="follow_user_result"></div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <?php if(is_array($user_tweets)): $i = 0; $__LIST__ = $user_tweets;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="tweet-boxing">
                    <div class="row tweet-boxing-heading">
                        <a href="<?php echo U('User/index', array('username'=>$userinfo['name']));?>">
                            <?php echo ($userinfo["name"]); ?>
                        </a>
                    </div>
                    <div class="row">
                        <?php echo ($vo["create_date"]); ?>
                    </div>
                    <div class="row">
                        <?php echo ($vo["tweet"]); ?> 
                    </div>
                    <hr class="tweet-boxing-line" />
                    <div class="row">
                        <div class="btn-group pull-right" role="group" aria-label="帖子操作">
                            <a href="" class="btn btn-info">转发</a>
                            <a href="" class="btn btn-warning">收藏</a>
                        </div>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        
        <nav>
            <?php echo ($page); ?>
        </nav>
        </div>
    </div>

                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
            
            <hr class="featurette-divider">
            
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <footer>
                        <p class="pull-right">
                            <a href="#">
                                <span class="glyphicon glyphicon-menu-up"></span>
                            </a>
                        </p>
                        <p>&copy; 2016 鸟语花香股份有限公司. &middot; <a href="#">免责条款</a> &middot; <a href="#">联系我们</a></p>
                    </footer>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        
        <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="/OpenBlog/Public/js/open-blog.js"></script>
    </body>
</html>