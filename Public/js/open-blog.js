$(document).ready(function(){
    
    var emailLoginIsOK=false;
    var passwdLoginIsOK=false;
    var emailLoginIsChecked=false;
    var passwdLoginIsChecked=false;

    var nameRegIsOK=false;
    var emailRegIsOK=false;
    var passwd1RegIsOK=false;
    var passwd2RegIsOK=false;
    var verifyRegIsOK=false;
    var nameRegIsChecked = false;
    var emailRegIsChecked = false;
    var passwd1RegIsChecked = false;
    var passwd2RegIsChecked = false;
    var verufyRegIsChecked = false;
    var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;

    //检查登录选项
    $("button#btn_login_submit").click(function(){
        if(!emailLoginIsChecked){
            $("#login_email").focus();
        }
        
        if(!passwdLoginIsChecked){
            $("#login_password").focus();
        }
        $(this).focus();
        if(emailLoginIsOK&&passwdLoginIsOK){
            return true;
        }
        return false;

    });
    
    $("input#login_email").blur(function(){
        var val=$(this).val().trim();
        var node=$("#login_email");    
        if(val.length==0){
            $("#login_email_group").attr("class","form-group has-error");
            node.attr("data-content","email不能为空");
            node.popover('show');
            emailLoginIsOK=false;
        }else if(!reg.test(val)){
            $("#login_email_group").attr("class","form-group has-error");
            node.attr("data-content","不是有效的email");
            node.popover('show');
            emailLoginIsOK=false;
        }else{
            $("#login_email_group").attr("class","form-group has-success");
            emailLoginIsOK=true;
        }
        emailLoginIsChecked = true;
        
    }).focus(function(){
        $("#login_email_group").attr("class","form-group");
        $(this).popover('hide');
        emailLoginIsChecked = false;
    });
    
    $("input#login_password").blur(function(){
        var val=$(this).val().trim();
        var node=$("#login_password");    
        if(val.length==0){
            $("#login_password_group").attr("class","form-group has-error");
            node.attr("data-content","密码不能为空");
            node.popover('show');
            passwdLoginIsOK=false;
        }else{
            $("#login_password_group").attr("class","form-group has-success");
            passwdLoginIsOK=true;
        }
        passwdLoginIsChecked = true;
    }).focus(function(){
        $("#login_password_group").attr("class","form-group");
        $(this).popover('hide');
        passwdLoginIsChecked = false;
    });
        
    // 检验注册选项
    $("button#btn_reg_submit").click(function(){
        if(!nameRegIsChecked){
            $("#reg_username").focus();
        }
        
        if(!emailRegIsChecked){
            $("#reg_email").focus();
        }
        
        if(!passwd1RegIsChecked){
            $("#reg_passwd").focus();
        }
        if(!passwd2RegIsChecked){
            $("#reg_passwd1").focus();
        }
        if(!verufyRegIsChecked){
            $("#reg_verify").focus();
        }
        $(this).focus();
        
        if(nameRegIsOK&&emailRegIsOK&&passwd1RegIsOK&&passwd2RegIsOK&&verifyRegIsOK){
            return true;
        }
        //alert(nameRegIsOK+' '+emailRegIsOK+' '+passwd1RegIsOK+' '+passwd2RegIsOK+' '+verifyRegIsOK);
        return false;
    });
        
    $("#reg_username").blur(function(){
        var url=$(this).attr("url");
        var name=$(this).val().trim();
        var node=$("#reg_username");    
        if(name.length==0) {
            $("#reg_username_group").attr("class","form-group has-error");
            node.attr("data-content","用户名不能为空");
            node.popover('show');
            nameRegIsOK=false;
        }else{
            var condstring='{"type":"1","value":{"name":"'+name+'"}}';
            $.post(
                url,
                {value:condstring},
                function(data){
                    if(data['status']==0){
                        //用户名可使用
                        $("#reg_username_group").attr("class","form-group has-success");
                        nameRegIsOK=true;
                    }else{
                        //用户名已注册
                        $("#reg_username_group").attr("class","form-group has-error");
                        node.attr("data-content","该用户名已被注册");
                        node.popover('show');
                        nameRegIsOK=false;
                    }
                }
            );    
        }
        nameRegIsChecked = true;
    }).focus(function(){
        $("#reg_username_group").attr("class","form-group");
        $(this).popover('hide');
        nameRegIsChecked = false;
    });
    
    $("#reg_email").blur(function(){
        var url=$(this).attr("url");
        var name=$(this).val().trim();
        var node=$("#reg_email");    
        if(name.length==0){
            $("#reg_email_group").attr("class","form-group has-error");
            node.attr("data-content","email不能为空");
            node.popover('show');
            emailRegIsOK=false;
        }else if(!reg.test(name)){
            $("#reg_email_group").attr("class","form-group has-error");
            node.attr("data-content","不是一个有效的email");
            node.popover('show');
            emailRegIsOK=false;
        }else{
            var condstring='{"type":"1","value":{"email":"'+name+'"}}';
            $.post(
                url,
                {value:condstring},
                function(data){
                    if(data['status']==0){
                        //email可用
                        $("#reg_email_group").attr("class","form-group has-success");
                        emailRegIsOK=true;
                    }else{
                        //email已注册
                        $("#reg_email_group").attr("class","form-group has-error");
                        node.attr("data-content","该email已被使用");
                        node.popover('show');
                        emailRegIsOK=false;
                    }
                }
            );    
        }
        emailRegIsChecked = true;
    }).focus(function(){
        $("#reg_email_group").attr("class","form-group");
        $(this).popover('hide');
        emailRegIsChecked = false;
    });
    
    $("#reg_passwd").blur(function(){
        var url=$(this).attr("url");
        var val=$(this).val().trim();
        var node=$("#reg_passwd");    
        if(val.length<6){
            $("#reg_passwd_group").attr("class","form-group has-error");
            node.attr("data-content","密码至少6位");
            node.popover('show');
            passwd1RegIsOK=false;
        }else{
            $("#reg_passwd_group").attr("class","form-group has-success");
            passwd1RegIsOK=true;
        }
        passwd1RegIsChecked = true;
    }).focus(function(){
        $("#reg_passwd_group").attr("class","form-group");
        $(this).popover('hide');
        passwd1RegIsChecked = false;
    });
    
    $("#reg_passwd1").blur(function(){
        var url=$(this).attr("url");
        var val=$(this).val().trim();
        var node=$("#reg_passwd1");    
        if(val==$("#reg_passwd").val().trim()){
            $("#reg_passwd1_group").attr("class","form-group has-success");
            passwd2RegIsOK=true;            
        }else{
            $("#reg_passwd1_group").attr("class","form-group has-error");
            node.attr("data-content","两次输入的密码不一致");
            node.popover('show');
            passwd2RegIsOK=false;            
        }
        passwd2RegIsChecked = true;
    }).focus(function(){
        $("#reg_passwd1_group").attr("class","form-group");
        $(this).popover('hide');
        passwd2RegIsChecked = false;
    });
    
    $("#reg_verify").blur(function(){
        var url=$(this).attr("url");
        var name=$(this).val().trim();
        var node=$("#reg_verify");    
        if(name.length==0) {
            $("#reg_verify_group").attr("class","form-group has-error");
            node.attr("data-content","验证码不能为空");
            node.popover('show');
            verifyRegIsOK=false;
        }else{
            var condstring='{"type":"2","value":{"code":"'+name+'"}}';
            $.post(
                url,
                {value:condstring},
                function(data){
                    if(data['status']==0){
                        //验证码正确
                        $("#reg_verify_group").attr("class","form-group has-success");
                        verifyRegIsOK=true;
                    }else{
                        //验证码不正确
                        $("#reg_verify_group").attr("class","form-group has-error");
                        node.attr("data-content","验证码不正确");
                        node.popover('show');
                        verifyRegIsOK=false;
                    }
                }
            );    
        }
        verufyRegIsChecked = true;
    }).focus(function(){
        $("#reg_verify_group").attr("class","form-group");
        $(this).popover('hide');
        verufyRegIsChecked = false;
    });
    
    // 点击图片重新生成验证码
    $("#img_reg_verify").click(function(){
        var verifyimg = $(this).attr("src");
        if( verifyimg.indexOf('?')>0){  
            $(this).attr("src", verifyimg+'&random='+Math.random());  
        }else{  
            $(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());  
        }  
    });
    
    // 点击发布文章按钮
    $("button#btn-article-submit").click(function(){
        
        var article_textarea = $("textarea#article-textarea");
        var article_editor_alert=$("#article-editor-alert");
        var article_editor_alert_content=$("#article-editor-alert-content");
        var url=$(this).attr("url");
        
        //取消点击空白处关闭modal;
        //$('#mod-ob-article-editor').modal({backdrop: 'static', keyboard: false});
        
        if(article_textarea.val().length==0){
            article_editor_alert_content.html('微博内容不能为空');
            article_editor_alert.removeClass('sr-only');
        }else if(article_textarea.val().length>240){
            article_editor_alert_content.html('微博内容超长');
            article_editor_alert.removeClass('sr-only');
        }else{
            var condstring='{"content":"'+article_textarea.val()+'","image_id_list":"","ref_article_id":""}';
            $.post(
                url,
                {value:condstring},
                function(data){
                    if(data['status']==0){
                        //发生错误
                        article_editor_alert_content.html('发布出错！');
                        article_editor_alert.removeClass('sr-only');
                    }else{
                        //发布成功
                        article_editor_alert_content.html('发布成功！');
                        article_editor_alert.removeClass('sr-only alert-danger');
                        article_editor_alert.addClass('alert-success');
                        $('#mod-ob-article-editor').modal('hide');
                        article_textarea.val("");
                        article_editor_alert.removeClass('alert-success');
                        article_editor_alert.addClass('sr-only alert-danger');
                    }
                }
            );
        }
    });
});



