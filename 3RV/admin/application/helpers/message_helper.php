<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function flash_message()
{
	// Create CI instance -
	$CI =& get_instance();
	
	// get flash message array set from controller -
	$flashmsg = $CI->session->flashdata('message');
	
	$html='';
	
	if($flashmsg['type'] == "s")	// for success
	{
		$html="<div class='uk-alert uk-alert-success' data-uk-alert=''><a href='#' class='uk-alert-close uk-close'></a>" ; 
	}
	else	// for error
	{
		$html="<div class='uk-alert uk-alert-danger' data-uk-alert=''><a href='#' class='uk-alert-close uk-close'></a>";
	}
	
	$html = $html.'<span><strong>';
	$html = $html.$flashmsg['content']."</strong></span></div>";
	
	return $html;
}