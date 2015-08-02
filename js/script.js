

jQuery(document).ready(function($){

  /////////////////////////////////
  // PINUP IMAGE TITLE RENDERING //
  /////////////////////////////////
  var $imageObject = $(".pinup1 img");
  var imageTitle = $imageObject.attr("alt");
  $imageObject.before("<div class='imageTitleFloater'>" + imageTitle + "</div>");

});
