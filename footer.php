	</div><!--/wrapper-->
	<!--footer-->
	<div id="footer">
		<div class="in">
			<?php
				$nav_args = array(
					'container'       => false, 
					'menu_class'      => 'b_menu', 
					'container_id'	  => 'footer-menu',
					'depth'           => 1,
					'before'          => '',
					'after'           => '',
					'link_before'     => '<span>',
					'link_after'      => '</span>',
					'theme_location'  => 'footer-menu'
					);
				wp_nav_menu($nav_args);
			?>

			<script type="text/javascript">
               (function($) {
				$('#menu-nizhnee-menyu').removeClass('t_menu');
				$('.mobile-menu .t_menu').removeClass('t_menu');
				$('#menu-medinciklopedia').removeClass('t_menu');
				$('#menu-medinciklopedia').addClass('sb_menu');
				
				$('#menu-meuchrezhdeniya').removeClass('t_menu');
				$('#menu-meuchrezhdeniya').addClass('sb_menu');
				
				$('#menu-vrachi').removeClass('t_menu');
				$('#menu-vrachi').addClass('sb_menu');
				
				$('#menu-nizhnee-menyu').addClass('b_menu');
				
				
				
				
				
				
				
				
				
				
				})(jQuery);
			</script>
			
			<?php dynamic_sidebar( 'footer-copyright' ); ?>
			
			<!--noindex-->
				<div class="subscribe">
					<div class="title">Подписка на новости</div>
					<p>Если вы хотите регулярно получать наши новости,<br>укажите свой адрес электронной почты.</p>
					<?php dynamic_sidebar( 'email-subscribers' ); ?>
					<?php/*
					<form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=medportal-news', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
						<input type="text" name="email"/>
						<input type="hidden" value="medportal-news" name="uri"/>
						<input type="hidden" name="loc" value="ru_RU"/>
						<input type="submit" value="Подписаться" rel="nofollow">
					</form>
					*/?>
				</div>
			<!--/noindex-->
		</div>
	</div><!--/footer-->

	<?php wp_footer(); ?>
	<?php dynamic_sidebar( 'final-code' ); ?>

	
	<?php
	
	wp_reset_query(); 
	$cat = get_category(get_query_var('cat'),false);
		
		$cat_root_id = root_category_id($cat);
		if(empty($cat_root_id)){
			$cat_post = get_the_category($post->ID);
			$cat_post_temp = $cat_post[0]->cat_ID;
			$cat_root_id = root_category_id($cat_post_temp);
		}

		

	?>

	<?php //if (($for_the_form_cat_id == 8)||($for_the_form_cat_id == 19)||($for_the_form_cat_id == 20)||($for_the_form_cat_id == 9)||($for_the_form_cat_id == 7)) { ?>
	<?php if (($cat_root_id == 8)||($cat_root_id == 19)||($cat_root_id == 20)||($cat_root_id == 9)||($cat_root_id == 7)) { ?>
		<div class="shadow" id="zak1">
			<div class="form_block">
				<div class="form_header"><span class="form_head_text"></span><div id="form_close" title="Закрыть форму"></div></div>
				<?php if ($cat_root_id == 8) { ?>
					<?php echo do_shortcode('[contact-form-7 id="505" title="Добавить новость"]');?>
				<?php } elseif ($cat_root_id == 19) { ?>
					<?php echo do_shortcode('[contact-form-7 id="508" title="Добавить предприятие"]');?>
				<?php } elseif ($cat_root_id == 20) { ?>
					<?php echo do_shortcode('[contact-form-7 id="507" title="Добавить врача"]');?>
				<?php } elseif ($cat_root_id == 9) { ?>
					<?php echo do_shortcode('[contact-form-7 id="506" title="Добавить статью"]');?>
				<?php } elseif ($cat_root_id == 7) { ?>
					<?php echo do_shortcode('[contact-form-7 id="476" title="Задать вопрос"]');?>
				<?php } ?>
				<script type="text/javascript">
				       (function($) {
						$('.form_head_text').text($('.b_add .btn').text());
					})(jQuery);
				</script>
			</div>
		</div>
	<?php } ?>
	<div class="shadow" id="zak2">
		<div class="form_block"><div class="form_header"><span class="form_head_text">Отправить заявку</span><div id="form_close2" title="Закрыть форму"></div></div>
			<?php echo do_shortcode('[contact-form-7 id="504" title="Отправить заявку"]');?>
		</div>
	</div>
	<script>
	jQuery(document).ready(function(e) {
		if(jQuery(".select1 .jq-selectbox__select-text").text()=='порталу'){
			jQuery(".select2").hide();
			jQuery(".select1").css({ 'right':'0px' });
		}else{
			jQuery(".select2").show();
			jQuery(".select1").css({ 'right':'148px' });
		}
	});
	</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter33608204 = new Ya.Metrika({
                    id:33608204,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/33608204" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>