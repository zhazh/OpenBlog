$(document).ready(function(){
        $("button#reg-user-button").click(function(){
            var cansubmit = 1;
            var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
            var regName = $("input#regUsername").val().trim();
            var regEmail = $("input#regEmail").val().trim();
            var regPasswd1 = $("input#regPasswd1").val().trim();
            var regPasswd2 = $("input#regPasswd2").val().trim();
            
            if(regName.length == 0){
                $("#reg-name-group").attr("class","form-group has-error");
                cansubmit = 0;
            }else{
                $("#reg-name-group").attr("class","form-group has-success");
            }
            
            if(regEmail.length == 0 || !reg.test(regEmail)){
                $("#reg-email-group").attr("class","form-group has-error");
                cansubmit = 0;
            }else{
                $("#reg-email-group").attr("class","form-group has-success");
            }
            
            if(regPasswd1.length<6 
                || regPasswd2.length<6 
                || regPasswd1!=regPasswd2){
                $("#reg-pwd1-group").attr("class","form-group has-error");
                $("#reg-pwd2-group").attr("class","form-group has-error");
                cansubmit = 0;
            }else{
                $("#reg-pwd1-group").attr("class","form-group has-success");
                $("#reg-pwd2-group").attr("class","form-group has-success");
            }
            
            if (cansubmit){
                return true;  
            }
            return false;
        });
        
        $("#tweet-editor").keyup(function(){
            var len=$("#tweet-editor").val().length;
            len=250-len;
            $("#tweet-editor-counter").html("您还可以输入字数："+len);
            if(len<=0) {
                return;
            }
        });
        
        $("#tweet-editor").keydown(function(){
            var len=$("#tweet-editor").val().length;
            len=250-len;
            $("#tweet-editor-counter").html("您还可以输入字数："+len);
            if(len<=0) {
                return;
            }
        });
});
