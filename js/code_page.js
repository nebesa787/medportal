jQuery(document).ready(function(e) {
	jQuery('#form_close').on('click', function(e) {
    	jQuery('.shadow').hide(300);
	});

	$('#doc_page').appendTo( $('body') );
	//$('#vfb-14-0').attr('checked', 'checked');
	//var two_digits = $('#vfb-3').val();
	//if (two_digits == '') { $('#vfb-3').val('14'); }
	//$('#form_head_text').text($('.b_add .btn').text());
});