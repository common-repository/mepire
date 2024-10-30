<?php
/*
Plugin Name: Mepire
Plugin URI: http://www.mepire.com/plugin/mepire.zip
Description: <a href="http://www.mepire.com/">Mepire</a>是一款国内首创、创新型的交互式图片工具栏。网站主开启该插件后，即可将网站静态图片转变成具有丰富互动功能的交互式图片。米派工具栏的引入，可以帮助网站主轻松地将“社会化”，“电子商务”等现代互联网的核心元素和网站的静态图片无缝结合，全面提升网站的粘性及流量和商业价值,<a href="options-general.php?page=mepire.php">启用插件后，点击这里进入设置向导</a>。
Version: 1.0
Author: 武汉昊奇科技有限公司
Author URI: http://www.mepire.com/
*/

add_action('wp_head','mepire' );
function mepire() {
	$mepire_code = get_option('mepire_code');
	$mepire_uid = get_option('mepire_uid');
	echo '<script type="text/javascript">document.write(\'<script type="text/javascript" charset="UTF-8" src="\'+"http://www.mepire.com/init/c/'.$mepire_code.'?uid='.$mepire_uid.'&"+Math.random()*99999999+\'"><\/script>\');</script>';
}

function mepireActionLinks($links, $file) {
	array_unshift($links, '<a href="options-general.php?page=mepire.php">'.__('Settings').'</a>');
	return $links;
}
add_filter('plugin_action_links_mepire/mepire.php','mepireActionLinks', 10, 2);

function mepire_menu() {
    add_options_page(__('Mepire设置', 'mepire'), __('Mepire', 'mepire'), 8, basename(__FILE__), 'mepire_options');
}
add_action('admin_menu', 'mepire_menu');

function mepire_options() {
	echo '<div style="font-family:\'宋体\';">';
	echo '<p style="font-size:150%;">&nbsp;&nbsp;&nbsp;&nbsp;Mepire是一款国内首创、创新型的交互式图片工具栏，更多详情请查看<a href="http://www.mepire.com/" target="_blank">Mepire官网</a>，Mepire插件效果展示：</p>';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="' . plugins_url('mepire_1.jpg', __FILE__) . '">';
	echo '<p style="font-size:150%;">&nbsp;&nbsp;&nbsp;&nbsp看了效果展示，您是不是想赶快试试?接下来跟着我开始设置吧！</p>';
	echo '<hr/><h2>第一步:</h2>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;访问网址：<a href="http://www.mepire.com/">http://www.mepire.com</a>，注册账号并登陆。<br/>';
	echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="' . plugins_url('mepire_2.jpg', __FILE__) . '">';
	echo '<h2>第二步:</h2>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;进入用户中心，选择站点、添加域名。<br/>';
	echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="' . plugins_url('mepire_3.jpg', __FILE__) . '">';
	echo '<h2>第三步:</h2>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;输入域名，点击下一步获取代码。<br/>';
	echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="' . plugins_url('mepire_4.jpg', __FILE__) . '">';
	echo '<h2>第四步:</h2>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;将获取到的code以及uid填入到下面表格并提交。<br/>';
	echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="' . plugins_url('mepire_5.jpg', __FILE__) . '">';
    echo '<hr/><form name="mepire_form" method="post" action="">';
    echo 'code:';
    echo '<input type="text" name="mepirecode" style="width:250px"/><br/><br/>';
    echo '&nbsp;uid:';
    echo '<input type="text" name="mepireuid" style="width:250px"/><br/>';
	echo '<p class="submit"><input type="submit" value="确认提交"/></p>';
	echo '</form>';
	if($_POST['mepirecode'] != '' || $_POST['mepireuid'] != ''){
		update_option('mepire_code',$_POST['mepirecode']);
		update_option('mepire_uid',$_POST['mepireuid']);
		echo '<div style="font-size:150%;">恭喜您，设置成功，赶快访问您的主页瞧瞧。';
		echo '点击&nbsp;<a href="plugins.php">返回</a>。</div><br/><br/>';
		echo 'code:&nbsp;'.get_option('mepire_code').'<br/>';
		echo '&nbsp;uid:&nbsp;'.get_option('mepire_uid').'<br/>';	
	}
	echo '</div>';	
}
