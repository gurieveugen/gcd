<?php
add_action('add_meta_boxes','gproject_add_meta_box');

function gproject_add_meta_box(){
	add_meta_box('subtitle','Subtitle', 'subtitle_editor', 'gprojects','normal','high');
}
function subtitle_editor(){
	global $post;
	$subtitle = get_post_meta($post->ID, 'subtitlee', true);
	wp_editor($subtitle, 'subtitlee', array('media_buttons'=>false, 'textarea_name'=>'subtitle_edit','textarea_rows'=>8));
}
add_action('save_post', 'gprojects_save_editor_data');

function gprojects_save_editor_data($post_id){
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	$content = $_POST['subtitle_edit'];
	update_post_meta($post_id, 'subtitlee', $content);
}
