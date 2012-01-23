function ajax_submit(form, output) {
  var my_form = form;
  var data = my_form.serialize();
  var method = my_form.attr('method');
  var action = my_form.attr('action');

  $.ajax({
    url: action,
    data: data,
    type: method,
    dataType: 'html',
    success: function(response) {
      output.html(response);
    }
  });
}

$('.genpassword').live('click', function(){
  ajax_submit( $(this).closest('form'), $('.jq_genpassword_result') );
  return false;
});

$('.genpassphrase').live('click', function(){
  ajax_submit( $(this).closest('form'), $('.jq_genpassphrase_result') );
  return false;
});

$('.gensentence').live('click', function(){
  ajax_submit( $(this).closest('form'), $('.jq_gensentence_result') );
  return false;
});

$('.genhash').live('click', function(){
  ajax_submit( $(this).closest('form'), $('.jq_genhash_result'));
  return false;
});

$('.genbase64').live('click', function(){
  ajax_submit( $(this).closest('form'), $('.jq_genbase64_result'));
  return false;
});
