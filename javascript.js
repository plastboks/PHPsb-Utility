if ( $.browser.msie ) {
  if ( $.browser.version < 9 ) {
    window.location.href = "http://windowsupdate.microsoft.com";
  }
}

if ( $.browser.opera ) {
  window.location.href = "http://getfirefox.com";
}

function isFloat (n) {
  return n===+n && n!==(n|0);
}

function isInteger (n) {
  return n===+n && n===(n|0);
}

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

// document ready
$(function(){


$('.jq_change').change(function(){
  var changed_val = parseInt($(this).val());
  var changed_val4 = parseInt($(this).val()) / 4;
  var change_val = $('.jq_change_input');
  var change_val_last = $('.jq_change_input_last');
  var maxlength = parseInt(32);

  if ( isInteger(changed_val4) ) {
    change_val.val(changed_val4);
    change_val_last.val(changed_val4);
  }

  if ( isFloat(changed_val4) ) {
    var modulus = (changed_val % 4);
    var div4 = (changed_val - modulus) / 4;
    var rest = div4 + modulus;
    change_val.val(div4);
    change_val_last.val(rest);
  }

});

// variable for inputbuffer
var ib;

$('.jq_change_input, .jq_change_input_last').focus(function(){
  ib = parseInt($(this).val());
});

$('.jq_change_input, .jq_change_input_last').change(function(){
  var now = parseInt($(this).val());
  var diff = now - ib;
  var newval = parseInt($('.jq_change').val()) + parseInt(diff);
  $('.jq_change').val(newval);
});


// end document ready
});
