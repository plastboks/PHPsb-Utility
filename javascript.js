// DOCUMENTREADY
$(function() {


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



// No enter on forms 
$('form').live('keydown', function(ev){
  if(e.keyCode == 13){
    return false;
  }
});


// Detect change in input function
function detect_change(input, min, max){

	input.change(function(ev){
    
    // if input is lower than min value
		if(input.val() < min){
			input.val(min);
		}

    // if input it higher than max value
		if(input.val() > max){
			input.val(max)
		}

	});

};

detect_change($('#jq_input_qty'), 1, 32);
detect_change($('#jq_input_num'), 6, 32);
detect_change($('#jq_input_llnum'), 0, 16);
detect_change($('#jq_input_lunum'), 0, 16);
detect_change($('#jq_input_nnum'), 0, 16);
detect_change($('#jq_input_pnum'), 0, 16);


/* END DOCUMENTREADY */
});
