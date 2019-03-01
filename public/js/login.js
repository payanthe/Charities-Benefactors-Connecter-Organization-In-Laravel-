$(document).ready(function () {
   $('.submit').click(function (e) {
       e.preventDefault();
       var data =$('form').serialize();
       $.ajax({
           type:'POST',
           url:'../php/login.php',
           data:data,
           cache:false,
           success:function (response) {
               if(response){
                   if(response === 'Login Success'){
                       document.getElementById("loginError").innerHTML = "&nbsp;&nbsp"+response+"&nbsp;&nbsp;";
                       $('#loginError').css('color','green');
                       window.location.replace('http://localhost:8080/MP/analys&designing%20Systems%20Projects/index.html');
                   }
                   else{
                       document.getElementById("loginError").innerHTML = "&nbsp;&nbsp;"+response+"&nbsp;&nbsp;";
                       $('#loginError').css('color','red');
                       $(".form-control-input").css({
                           "border" : "2px solid #C1440D"
                       });
                   }
               }
               else{
                   document.getElementById("loginError").innerHTML = "&nbsp;&nbspServer Error&nbsp;&nbsp;";

               }
           }
       })
   })
});