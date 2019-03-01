$(document).ready(function () {
    $('.submit').click(function (e) {
        e.preventDefault();
        var data =$('form').serialize();
        $.ajax({
            type:'POST',
            url:'../php/donatorReg.php',
            data:data,
            cache:false,
            success:function (response) {
                if(response){
                    console.log(response);
                    if(response === 'Register Successful'){
                        document.getElementById("regResponse").innerHTML = "&nbsp;&nbsp"+response+"&nbsp;&nbsp;";
                    }
                    else{
                        document.getElementById("regResponse").innerHTML = "&nbsp;&nbsp;"+response+"&nbsp;&nbsp;";
                    }
                }
                else{
                    document.getElementById("regResponse").innerHTML = "&nbsp;&nbspServer Error&nbsp;&nbsp;";

                }
            }
        })
    })
});