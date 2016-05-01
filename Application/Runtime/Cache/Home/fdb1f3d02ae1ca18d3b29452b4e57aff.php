<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
    <title>OpenBlog</title>    


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
                            <a class="navbar-brand" href="#">OpenBlog</a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            
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
        
        
        <div class="container-fluid main-body">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="content-wrapper">
                        
    <div class="member-context-wrapper row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
  <li role="presentation"><a href="<?php echo U('Member/index');?>">首页</a></li>
  <li role="presentation"><a href="">消息</a></li>
  <li role="presentation"><a href="">收藏</a></li>
</ul>
        </div>
        <div class="col-md-7">
            发布成功！
        </div> <!-- end of <div class="col-md-7"> -->
        
        <div class="col-md-3">
            <div class="userinfo">
    <div class="row text-center tweet-boxing-heading">
        <?php echo ($_SESSION['user']['name']); ?>
    </div>
                
    <div class="row">
        <div class="col-md-4 text-center"><span class="glyphicon glyphicon-comment"></span></div>
        <div class="col-md-4 text-center"><span class="glyphicon glyphicon-eye-open"></span></div>
        <div class="col-md-4 text-center"><span class="glyphicon glyphicon-user"></span></div>
    </div>
    
    <div class="row">
        <div class="col-md-4 text-center">5</div>
        <div class="col-md-4 text-center">15</div>
        <div class="col-md-4 text-center">5</div>
    </div>
</div>

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