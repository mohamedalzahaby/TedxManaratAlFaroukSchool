$(document).ready(function() {
    var $scoll    = $('.scroll-overflow'),
        $scroller = $('.scroll-scroller'),
        $scrollerInner = $scroller.find('div'),
        $table    = $('.scroll-table');
        
    $scrollerInner.width($table.width());
    
    $scroller.on('scroll', function(event) {
      $table.css('left', $scrollerInner.position().left);
    });
    
    var $legendX = $table.find('th');
    var $legendY = $('.scroll-legend').find('.scroll-legend-row');
    
    $table.on('mouseover', 'td', function(event) {
      var col = $(this).index();
      var row = $(this).parent('tr').index();
      
      $(this).closest('tbody').prevAll('tbody').each(function() {
        row = row + $(this).find('tr').length;
      });
      
      $legendX.removeClass('legend-highlight').eq(col).addClass('legend-highlight');
      $legendY.removeClass('legend-highlight').eq(row).addClass('legend-highlight');
    });
    
    $table.on('mouseleave', function() {
      $legendX.removeClass('legend-highlight');
      $legendY.removeClass('legend-highlight');
    });
  });