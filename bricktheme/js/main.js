(function($){
   /* If this line runs, it means Javascript is enabled in the browser
    * so replace no-js class with js for the body tag
    */
   document.body.className = document.body.className.replace("no-js","js");

    
  /* -----------------------------------------------------------------*/
  /* Activate accessible superfish
  /* -----------------------------------------------------------------*/
  $('.primary-navigation').find('.menu').superfish({
      smoothHeight : true,
      delay : 600,
      animation : {
         opacity :'show',
         height  :'show'
      },
      speed : 'fast', 
      autoArrows : false 
  });
    
})(jQuery);

/* -----------------------------------------------------------------*/
/* Add Placeholder to the Email input field of "Email Subscribers" widget
/* -----------------------------------------------------------------*/
if( $( '.elp-widget input[type="email"]' ).length ){
    $( '.elp-widget input[type="email"]' ).attr('placeholder', 'Enter your email address here');
}
