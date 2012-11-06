/*Changing Logout button*/
$(function(){
   if($('#logout span').text()=='Guest'){
        $('#logout a').attr('class','logout');
   }
   
   
   if ($(window).width()< 900){
      $("#stylesheet_main").attr('href','<?=Yii::app()->request->baseUrl; ?>/css/main2.css') ; 
      $("#stylesheet_form").attr('href','<?=Yii::app()->request->baseUrl; ?>/css/form2.css') ;
   }
   
});
