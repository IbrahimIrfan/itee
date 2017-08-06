function appendFooter(){
  var footer = "<div class='footer'>";
  footer += "<center><div class='copyrightText'>&copy; 2017 ITEE Group Canada</div></center>";
  footer += "</div>";
  $('body').append(footer);
}

$(document).ready(function(){
  appendFooter();
});
