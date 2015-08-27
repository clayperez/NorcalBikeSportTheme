

jQuery(document).ready(function($){

  /////////////////////////////////
  // PINUP IMAGE TITLE RENDERING //
  /////////////////////////////////
  $(".pinupAltFloater img").each(function(){
    var $dom = $(this);
    $dom.before("<div class='imageTitleFloater'>" + $dom.attr("alt") + "</div>");
  });

});
