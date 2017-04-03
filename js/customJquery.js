/*function for search bar begin*/
         $(function(){
          var $searchlink = $('#searchtoggl i');
          var $searchbar  = $('#searchbar');
          
          $('#searchtoggl').on('click', function(e){
            e.preventDefault();
            
            if($(this).attr('id') == 'searchtoggl') {
              if(!$searchbar.is(":visible")) { 
                // if invisible we switch the icon to appear collapsable
                $searchlink.removeClass('fa-search').addClass('fa-search-minus');
              } else {
                // if visible we switch the icon to appear as a toggle
                $searchlink.removeClass('fa-search-minus').addClass('fa-search');
              }
              
              $searchbar.slideToggle(300, function(){
                // callback after search bar animation
              });
            }
          });
          
          $('#searchform').submit(function(e){
            e.preventDefault(); // stop form submission
          });
        });
/*function for search bar end */

/*function for filterizr begin*/
      $(function() {
            //Initialize filterizr with default options
            $('.filtr-container').filterizr();
        });
 /*function for filterizr end*/

 /*function for skillbar begin*/
          jQuery(document).ready(function(){
      jQuery('.skillbar').each(function(){
        jQuery(this).find('.skillbar-bar').animate({
          width:jQuery(this).attr('data-percent')
        },6000);
      });
    });
 /*function for skillbar end*/

 /*function for counter begin*/
                                                        
        $('.timer').each(function () {
   $(this).prop('Counter',0).animate({
       Counter: $(this).text()
   }, {
       duration: 4000,
       easing: 'swing',
       step: function (now) {
           $(this).text(Math.ceil(now));
       }
   });
});
        
        var eventFired = false;

        $(window).scroll(function() {
  var hT = $('#counter').offset().top,
      hH = $('#counter').outerHeight(),
      wH = $(window).height(),
      wS = $(this).scrollTop();
   console.log((hT-wH) , wS);
  if (wS > (hT+hH-wH) && eventFired === false){
    scrollT(); 
    eventFired = true;
  }
        });
/*function for counter end*/


