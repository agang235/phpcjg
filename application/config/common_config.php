<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *  通用配置文件
 *
 */

/**
 * 前端缓存控制
 */
$config['version']	= (ENVIRONMENT == 'development') ? rand(1,999) : '0.0.1';

$config['site_name']	= 'php藏经阁';
/**
 * 网页默认标题  
 */
$config['title']	= 'CodeIgniter2.1-stable 试用';
/**
 * 使用的doctype  
 * 请参考 ./blog/config/doctypes.php
 */
$config['doctype']	= 'html5';

$config['css_path'] = 'static/css/';
$config['js_path'] = 'static/js/';
/**
 * 编辑器版本
 */
$config['editor_path'] = 'static/editor/';

/**
 * set timezone
 */
date_default_timezone_set('PRC');

define('CAT_JINGSHU_ID', 1); //经书分类
define('CAT_BLOG_ID', 3); //日志分类
define('CAT_TODO_ID', 4); //TODO分类


/* End of file common_config.php */
/* Location: ./blog/config/common_config.php */
