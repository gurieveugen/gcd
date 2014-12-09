<?php 

add_action('add_meta_boxes','project_add_meta_box');

function project_add_meta_box(){
	add_meta_box('rational','Rational', 'rational_editor', 'gcd_projects','normal','high');
}

function rational_editor(){
	global $post;
	$rational = get_post_meta($post->ID, 'rationale', true);
	wp_editor($rational, 'rationale', array('media_buttons'=>false, 'textarea_name'=>'rational_edit','textarea_rows'=>8));
}

add_action('save_post', 'projects_save_editor_data');
function projects_save_editor_data($post_id){
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	$content = $_POST['rational_edit'];
	update_post_meta($post_id, 'rationale', $content);
}
