<?php
$cat_name =single_cat_title( '', false );
$cat_id = get_cat_ID( $cat_name );
?>
<?php

$doc_famname = get_field( "doc_famname" );
$doc_name = get_field( "doc_name" );
$doc_midname = get_field( "doc_midname" );

$doc_qualif = get_field( "doc_qualif" );
$doc_lvl = get_field( "doc_lvl" );

$doc_spc_arr = get_field( "doc_spc" );

for ($i = 0; $i < sizeof($doc_spc_arr); $i++) {
	if ($i == 0) { $doc_spc = $doc_spc_arr[$i]; }
	else { $doc_spc .= ', '.$doc_spc_arr[$i]; }
}
?>
<div class="preview medicine">
	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div>