$(document).ready(function() {
    
// Smooth scroll 
smoothScroll.init({
offset: 74,
scrollTarget: $(this).val()
});

// Waypoints
$('.page').waypoint(function(direction) {
    if (direction === 'down') {
    var wayID = this.element.id;
    } else {
        var previo = $(this).prev();
        var wayID = previo.prevObject["0"].element.id;
        };    
    $('#sticky li.active').removeClass('active'); 
    $('#nav-menu li.' + wayID).addClass('active');
}, { offset: '76px' });
    
//Sticky Menu   
    var flag = false;
    var scroll;
    
    $(window).scroll(function() {
      scroll = $(window).scrollTop();
      
      if (scroll > 200) {
          if (!flag) {
            $("#sticky").addClass("sticky");
            $("#more").addClass("hidden");
            $( "#burguer" ).removeClass('hidden');
            flag = true;
            }
          
      } else {
          if (flag) {
          $("#sticky").removeClass("sticky");
          $("#more").removeClass("hidden");
          $("#nav-menu").removeClass("responsive");
          $( "#close" ).addClass('hidden');
          flag = false; 
          }
      } 
        
    });
    
// Despliegue de menu responsive
    
    $( "#close" ).addClass('hidden');
    $( "#burguer" ).click(function() {
        $( "#nav-menu" ).toggleClass('responsive');
        $( "#burguer" ).addClass('hidden');
        $( "#close" ).removeClass('hidden');
    });
    
    $( "#close" ).click(function() {
        $( "#nav-menu" ).toggleClass('responsive');
        $( "#close" ).addClass('hidden');
        $( "#burguer" ).removeClass('hidden');
    });
 
// Hover en flechas de carousel de trabajos
    $('#proyects').mouseenter(function(){
       $('.carousel-control').fadeIn('fast'); 
    });
    $('#proyects').mouseleave(function(){
       $('.carousel-control').fadeOut('fast'); 
    });
    
    
});