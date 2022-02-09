//Delete default action buttons
var $btn = $('button');
var $form = $('form');

$btn.click(function(e) {
  document.getElementsByTagName("form").submit();
 });