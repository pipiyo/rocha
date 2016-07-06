
$(document).ready(function() {
    goheadfixed('table.fixed');


  function goheadfixed(classtable) {
  
    if($(classtable).length) {
  
      $(classtable).wrap('<div class="fix-inner"></div>'); 
      $('.fix-inner').wrap('<div class="fix-outer" style="position:relative;margin-top:150px; "></div>');
      $('.fix-outer').append('<div style="background:blue;" class="fix-head"></div>');
      $('.fix-head').prepend($('.fix-inner').html());
      $('.fix-head table').find('caption').remove();
      $('.fix-head table').css('width','');
  
      
      $('.fix-head').css('width','');
      $('.fix-head').css('height', $('.fix-inner table thead').height()+'px');
  
      // If exists caption, calculte his height for then remove of total
      var hcaption = 0;
      var f = '';
      if($('.fix-inner table caption').length != 0)
        hcaption = parseInt($('.fix-inner table').find('caption').height()+'px');

      // Table's Top
      var hinner = parseInt( $('.fix-inner').offset().top );

      // Let's remember that <caption> is the beginning of a <table>, it mean that his top of the caption is the top of the table
      $('.fix-head').css({'position':'absolute', 'overflow':'hidden', 'top': hcaption+'px', 'left':0, 'z-index':100});
    
      $(window).scroll(function () {
        var vscroll = $(window).scrollTop();
  
        if(vscroll >= hinner + hcaption - 140)
          $('.fix-head').css({'top':(vscroll-hinner)+'px','margin-top':'150px'});
        else
          $('.fix-head').css({'top': hcaption+'px','margin-top':'0px'});
      });
  
      /*  If the windows resize */
      $(window).resize(goresize);
  
    }
  }

  function goresize() {
    $('.fix-head').css('width', $('.fix-inner table').outerWidth(true)+'px');
    $('.fix-head').css('height', $('.fix-inner table thead').outerHeight(true)+'px');
  }
    
});
