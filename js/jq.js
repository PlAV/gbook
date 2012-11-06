/*Changing Logout button*/
$(function(){
   // Logout
   if($('#log_name').text()=='Guest'){
        $('#logout div a').attr('class','logout');
   };
   
   //Comment form
   $('#comments-form').hide();
   $('#сommBut input').click(function(){
        $('#comments-form').slideToggle(1500);
        if ($(this).attr('value')=='Add comment'){
            $(this).attr('value','Hide form');
        }else{
          $(this).attr('value','Add comment');
        }
   })
   
   
});
