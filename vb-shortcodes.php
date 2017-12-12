<?php
/**
 * @package Visual Budget - Add-on shortcodes
 * @version 0.1
 */
/*
Plugin Name: Visual Budget - Add-on shortcodes
Plugin URI: http://visgov.com/
Description: Composite shortcodes for visualizations.
Author: Alan Jones
Version: 0.1
Author URI: http://visgov.com/
*/

function vb_metric_block_func($atts ) {
	$a = shortcode_atts( array('data' => ''), $atts );
	$ret = 'Fiscal Year: [visualbudget data='.$a['data'].' vis=metric metric=date class="left-metric"]<br/>'.
	'Total: [visualbudget data='.$a['data'].' vis=metric metric=datetotal]<br/>'.
	'$ Growth: [visualbudget data='.$a['data'].' vis=metric metric=absgrowth]<br/>'.
	'% Growth: [visualbudget data='.$a['data'].' vis=metric metric=percentgrowth]<br/>'.
	'[visualbudget data='.$a['data'].' vis=metric metric=numyearsaveraged]-year average: [visualbudget data=expenses vis=metric metric=5yearaverage]<br/>'.
	'Download this dataset [visualbudget data='.$a['data'].' vis=metric metric=download]';	
	return '<div style="float:left; width:30%;">'.do_shortcode($ret).'</div>';
}
add_shortcode( 'vb_metric_block', 'vb_metric_block_func');

function vb_vis_left_func($atts) {
	$a = shortcode_atts( array(
		'data' => '',
		'vis' => '',
		'before' => '',
		'after' => ''
		), $atts );
		$ret = '[visualbudget data='.$a['data'].' vis='.$a['vis'].']';
		$ret = $a['before'].$ret.$a['after'];
		return '<div style="float:left; width:45%; clear:left;">'.do_shortcode($ret).'</div>';
}
add_shortcode('vb_vis_left','vb_vis_left_func');

function vb_vis_right_func($atts) {
	$a = shortcode_atts( array(
		'data' => '',
		'vis' => '',
		'before' => '',
		'after' => '',
		'showmycontribution' => ''
		), $atts );
		$ret = '[visualbudget data='.$a['data'].' vis='.$a['vis']. ' showmycontribution='.$a['showmycontribution'].']';
		$ret = $a['before'].$ret.$a['after'];
		return '<div style="float:right; clear:right; width:50%;">'.do_shortcode($ret).'</div>';
}
add_shortcode('vb_vis_right','vb_vis_right_func');

function vb_vis_full_func($atts) {
	$a = shortcode_atts( array(
		'data' => '',
		'vis' => '',
		'before' => '',
		'after' => ''
		), $atts );
		$ret = '[visualbudget data='.$a['data'].' vis='.$a['vis'].']';
		$ret = $a['before'].$ret.$a['after'];
		return '<div style="float:left; width:100%; clear:both;">'.do_shortcode($ret).'</div>';
}
add_shortcode('vb_vis_full','vb_vis_full_func');



?>
