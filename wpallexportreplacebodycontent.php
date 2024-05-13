<?php
function strip_vc_codes($content){
	$content = preg_replace_callback('/\[image_with_animation image_url="(\d+)"[^]]*\]/', function($matches) {
    $attachment_id = $matches[1];
    $image_url = wp_get_attachment_url($attachment_id);
    if (!$image_url) {
        return "No Image Found!";
    }
    return ' <img src="'.$image_url.'" > ';
}, $content);
	$content = preg_replace('/\[[^\]]*\]/', '', $content);
    $content = preg_replace('/<span[^>]*>/', '', $content);
    $content = preg_replace('/<\/span>/', '', $content);
	return $content;
}
?>