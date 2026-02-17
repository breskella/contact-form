  $(function(){
    'use strict';

     var userError = true , emailError = true , masgError=true;

    

    $('.username').on('keyup blur', function(){
       if ($(this).val().length < 4){
        $(this).css('border','1px solid #F00').parent().find('.custom-alert').fadeIn(200).end().find('.asterisx').fadeIn(100);
        userError= true;
       }else{
        $(this).css('border','1px solid #080').parent().find('.custom-alert').fadeOut(200).end().find('.asterisx').fadeOut(100);
        userError= false;

    }
     });


    $('.email').on('keyup blur', function(){
       if ($(this).val() === ''){
        $(this).css('border','1px solid #F00').parent().find('.custom-alert').fadeIn(200).end().find('.asterisx').fadeIn(100);
        emailError= true;

       }else{
        $(this).css('border','1px solid #080').parent().find('.custom-alert').fadeOut(200).end().find('.asterisx').fadeOut(100);
        emailError= false;

    }

     });
     
      $('.message').on('keyup blur', function(){
       if ($(this).val().length < 11){
        $(this).css('border','1px solid #F00').parent().find('.custom-alert').fadeIn(200).end().find('.asterisx').fadeIn(100);
        masgError= true;

       }else{
        $(this).css('border','1px solid #080').parent().find('.custom-alert').fadeOut(200).end().find('.asterisx').fadeOut(100);
        masgError= false;

    }

     });

     $('.contact-form').submit(function(e){
            if (userError || emailError || masgError){
            e.preventDefault();
            $('.username, .email, .message').blur();
            } 
     });
  });