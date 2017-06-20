    $(document).ready(function(){  
      
        //When mouse rolls over  
        $("#easing li").mouseover(function(){  
            $(this).stop().animate({height:'150px'},{queue:false, duration:600, easing: 'easeOutBounce'})  
        });  
      
        //When mouse is removed  
        $("#easing li").mouseout(function(){  
            $(this).stop().animate({height:'70px'},{queue:false, duration:600, easing: 'easeOutBounce'})  
        });  
      
    });  