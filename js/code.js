jQuery(document).ready(function(e) {

	jQuery(".s_in_wr .select").click(function(){
        //jQuery(this).children('ul').toggle();
	});

	jQuery("#ser_sel_ghost").children('li').click(function(){
        //jQuery(".s_in_wr .select1").children('span').text(jQuery(this).text());

        //jQuery(".hide_class").hide();
		//jQuery("."+jQuery(this).attr("ghost_choice")).toggle();
		
	});
	jQuery(".chzn-results").children('li').click(function(){
        //jQuery(".s_in_wr .select2").children('span').text(jQuery(this).text());

        //jQuery(".hide_class").hide();
		//jQuery("."+jQuery(this).attr("ghost_choice")).toggle();
		
	});
	
	/*
	jQuery('#searchform_apt').submit(function(){
	
		if(jQuery('#s_s').val().length >3){
			if (jQuery("#typer" ).val() == 'portal'){
				jQuery("#searchform_apt").attr("action", "/");
				jQuery("#s_ls" ).remove();
			}else{
				jQuery("#searchform_apt").attr("action", "/result/");
				jQuery("#s_ls" ).val(jQuery("#s_s" ).val());
				jQuery("#s_s" ).remove();
			}
		} else {			  
			return false;
			alert('nook');
		}
	});
	*/
	
	jQuery('#searchform_apt').submit(formValidated);
		function formValidated(){
			if(jQuery('#s_s').val().length >3){
				if (jQuery("#typer" ).val() == 'portal'){
					jQuery("#searchform_apt").attr("action", "/");
					jQuery("#s_ls" ).remove();
				}else{
					jQuery("#searchform_apt").attr("action", "/result/");
					jQuery("#s_ls" ).val(jQuery("#s_s" ).val());
					jQuery("#s_s" ).remove();
				}
				jQuery("#s_s" ).css({'color':'#A9B5BA'});	
				return true;
			} else {			  
				jQuery("#s_s" ).css({'color':'red'});	
				return false;
			}
		}
			
			
	
	
	
	jQuery(".select1").click(function(){
		if(jQuery(".select1 .jq-selectbox__select-text").text()=='порталу'){
			jQuery(".select2").hide();
			jQuery(".select1").css({ 'right':'0px' });
		}else{
			jQuery(".select2").show();
			jQuery(".select1").css({ 'right':'148px' });
		}
	});
	
	

	
	jQuery("#med_s").submit(function() {
		city_search = jQuery("#city_search").val();
		if (city_search){
			jQuery("#med_s").attr("action", city_search);	
		}
    });
	
	
	jQuery("#vr_s").submit(function() {
		city_search = jQuery("#city_search").val();
		
		if (city_search){
			jQuery("#vr_s").attr("action", city_search);	
		}
    });
	
	
	jQuery("#med_s_m").submit(function() {
		city_search = jQuery("#city_search_m").val();
		if (city_search){
			jQuery("#med_s_m").attr("action", city_search);	
		}
    });
	
	
	jQuery("#vr_s_m").submit(function() {
		city_search = jQuery("#city_search_m").val();
		
		if (city_search){
			jQuery("#vr_s_m").attr("action", city_search);	
		}
    });
	
	
	
	
	
	
	
	
	
	
	
	
	jQuery( ".all_adress" ).click(function() {
		jQuery(this).toggleClass("active")
	    jQuery( ".all_adr_list" ).toggle("slow");
	});
	
	jQuery( ".all_adr_listing .close " ).click(function() {
		jQuery(".all_adr_listing").hide("slow");
		jQuery(this).prev().prev().removeClass("active");
	});
	
	jQuery( ".all_adress_listing" ).click(function() {
		jQuery(this).toggleClass("active");
		jQuery(this).next().toggle("slow");
	    //jQuery( ".all_adr_listing" ).toggle("slow");
	});
	
	
	
	
	
	jQuery( ".mobile-icon-menu" ).click(function() {
		jQuery(this).toggleClass("active")
	    jQuery( ".dt-mobile-header" ).toggle("slow");
	});
	
	jQuery( ".close-icon" ).click(function() {
	    jQuery( ".mobile-icon-menu" ).removeClass("active");
	    jQuery( ".dt-mobile-header" ).hide("slow");
	});
	
	
	jQuery( ".btn_fil" ).click(function() {
	    //jQuery( ".filter.mobile" ).toggle("slow");
	    jQuery( ".filter.mobile" ).show("slow");
	});
	
	
	
	
	
	jQuery('.block_hide').slideUp();

	jQuery('.show_more').on('click', function(e) {
		if(jQuery(this).hasClass('show_less')) {			e.preventDefault();
			jQuery(this).siblings('.block_hide').slideUp(400);
			jQuery(this).children('span').children('a').text('Еще');
			jQuery(this).removeClass('show_less');		}
		else {
			e.preventDefault();
			jQuery(this).siblings('.block_hide').slideDown(400);
			jQuery(this).children('span').children('a').text('Свернуть');
			jQuery(this).addClass('show_less');
		}
	});

	jQuery('.b_add .btn').on('click', function(e) {
    	jQuery('#zak1').show(300);
	});
	jQuery('#form_close').on('click', function(e) {
    	jQuery('#zak1').hide(300);
	});

	jQuery('.doc_call').on('click', function(e) {
		ml_redir = jQuery(this).attr('data-redir');
		jQuery('input[name=med_email]').val(ml_redir);
    	jQuery('#zak2').show(300);
	});
	jQuery('#form_close2').on('click', function(e) {
    	jQuery('#zak2').hide(300);
	});


	jQuery('.b_gal .thumbs .thumb a img').on('click', function(e) {		jQuery('.thumb_b img').attr('src', jQuery(this).attr('data-org'));
	});
});



	

