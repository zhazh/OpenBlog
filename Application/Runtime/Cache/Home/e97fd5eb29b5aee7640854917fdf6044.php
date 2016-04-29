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
        <nav class="navbar navbar-inverse">
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
    <li><a href="<?php echo U('User/login');?>">登录</a></li>
    <li><a href="<?php echo U('User/reg');?>">注册</a></li>
</ul>

                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </nav>
        
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="content-wrapper">
                        
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="sigin-box-warpper-heading">
                <h2>注册用户</h2>
            </div>
            <form action="<?php echo U('User/add');?>" method="post" class="sigin-box-warpper form-horizontal">
                <div class="sign-box-error-info">
                    <?php if(isset($message)): ?><p><span class="glyphicon glyphicon-remove"></span><?php echo ($message); ?></p><?php endif; ?>
                    <!--
                    <p><span class="glyphicon glyphicon-remove"></span>用户名已存在！</p>
                    -->
                </div>
                <div class="form-group">
                    <label for="regUsername" class="control-label col-md-3">用户名</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="regUsername" name="username" placeholder="用户名" required autofocus>
                    </div>
                    <div class="col-md-2">
                        <div class="sign-box-error-info">*</div>
                    </div>
                </div>                
                <div class="form-group">
                    <label for="regEmail" class="control-label col-md-3">邮箱</label>
                    <div class="col-md-7">
                        <input type="email" class="form-control" id="regEmail" name="email" placeholder="邮箱" required autofocus>
                    </div>
                    <div class="col-md-2">
                        <div class="sign-box-error-info">*</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="regPasswd1" class="control-label col-md-3">密码</label>
                    <div class="col-md-7">
                        <input type="password" class="form-control" id="regPasswd1" name="passwd" placeholder="至少6位的数字和字母组合" required>
                    </div>
                    <div class="col-md-2">
                        <div class="sign-box-error-info">*</div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="regPasswd2" class="control-label col-md-3">确认密码</label>
                    <div class="col-md-7">
                        <input type="password" class="form-control col-md-10" id="regPasswd2" placeholder="再输入一次密码" required>
                    </div>
                    <div class="col-md-2">
                        <div class="sign-box-error-info">*</div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-7">
                        <button type="submit" class="btn btn-primary btn-block">注册</button>
                    </div>
                </div>
            </form>
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
                        <p class="pull-right"><a href="#">回到顶部</a></p>
                        <p>&copy; 2016 鸟语花香股份有限公司. &middot; <a href="#">免责条款</a> &middot; <a href="#">联系我们</a></p>
                    </footer>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        
        <script src="/OpenBlog/Public/js/open-blog.js"></script>
        <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>