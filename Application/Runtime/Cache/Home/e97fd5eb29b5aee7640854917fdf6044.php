<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
    <title>OpenBlog</title>    


        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="/OpenBlog/Public/openblog.css">
    </head>
    
    <body>
        <nav class="navbar navbar-default">
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
    <li class="active"><a href="<?php echo U('User/login');?>">登录</a></li>
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
                    
    <div class="row">
        <div class="col-md-offset-4 col-md-4">           
            <form class="form-sigin">
                <h2 class="form-sigin-heading">用户注册</h2>
                <div class="form-group">
                    <label for="regUsername" class="control-label sr-only">用户名</label>
                    <input type="text" class="form-control" id="regUsername" placeholder="用户名" required autofocus>
                </div>                
                <div class="form-group">
                    <label for="regEmail" class="control-label sr-only">邮箱</label>
                    <input type="email" class="form-control" id="regEmail" placeholder="邮箱" required autofocus>
                </div>
                <div class="form-group">
                    <label for="regPasswd1" class="control-label sr-only">密码</label>
                    <input type="password" class="form-control" id="regPasswd1" placeholder="至少6位的数字和字母组合" required>
                </div>
                
                <div class="form-group">
                    <label for="regPasswd2" class="control-label sr-only">密码</label>
                    <input type="password" class="form-control" id="regPasswd2" placeholder="再输入一次密码" required>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">提交</button>
                </div>
            </form>
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
        
        <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>