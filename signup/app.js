$(document).ready(function(){
    $('.submit').click(function () { 
        $userName=$('#txtUser').val();
        $pass1=$('#txtPass1').val();
        $pass2=$('#txtPass2').val();
        $position=$('txtPosition').val();
        $email = $('txtEmail').val();
       
        if($userName=='' || $pass1 =='' || $pass2 =='' || $position ==''|| $email ==''){
            alert("Vui lòng nhập đầy đủ thông tin đăng kí của bạn");
            return false;
        }else{
          
              
           

        }
        
    });
})