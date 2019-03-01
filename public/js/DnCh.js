$(document).ready(function () {
   var optionsValue = $('#requirements').text();
   var option = optionsValue.split(',');
   for(var i=0 ; i<option.length ; i++ ){
       $('select').append('<option value="'+option[i]+'" name="field">'+option[i]+'</option>')
   }
   console.log(option);
});