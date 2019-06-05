$(document).ready(function(){
  $('#area').change(function(){ //on change of dropdown
  if($(this).val() == "Other") // check if dropdown value is other
  {
   $('#area-txt').show();  // show textbox
  }
  else
  {
  $('#area-txt').hide(); //hide textbox
 
  }
 });
 });