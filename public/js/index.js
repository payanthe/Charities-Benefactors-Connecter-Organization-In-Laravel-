$(document).ready(function (){
    $('[data-toggle="tooltip"]').tooltip({
        placement : 'bottom',
        trigger : 'hover'
    });
    cookies();
    function cookies() {
        var cookies = document.cookie;
        var name = cookies.split('=');
        if(cookies !== ''){
            $('.loginLink').css('display','none');
            $('.dashboardLink').css('display','inline-block');
            $('.dashboardLink').text(name[1]);
        }
        else{
            $('.loginLink').css('display','inline-block');
            $('.dashboardLink').css('display','none');
        }
    }
   /* var height =$(window).height();
    $('.glassBox').height(height);
    $('main').height(height);*/
});