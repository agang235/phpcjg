<?php 
/**
 * 通用类
 * 
 * 包含一些常用的方法
 */
class Lib{
	/**
	 * 判断当前请求是否为ajax
	 * @return 
	 */
	public static function is_ajax()
	{
		return ((isset($_GET['ajax']) && $_GET['ajax']) 
		|| (isset($_POST['ajax']) && $_POST['ajax']));
	}
	
	public static function is_post()
	{
		return strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') === 0;
	}
	
	/**
	 * 存储会话临时消息
	 * @param object $arr
	 * @return 
	 */
	public static function flash_in($arr)
	{
		$CI =& get_instance();
		$CI->session->set_flashdata($arr);
	}
	
	/**
	 * 取出会话临时工消息，只可操作一次
	 * @param object $item
	 * @return 
	 */
	public static function flash_out($item)
	{
		$CI =& get_instance();
		return $CI->session->flashdata($item);
	}
	
	/**
	 * 记录当前页面
	 * 
	 * @return 
	 */
	public static function log_current_page()
	{
		$CI =& get_instance();
		$CI->session->set_userdata(array('last_page' => $CI->uri->uri_string));
	}
	
	/**
	 * 得到当前用户信息
	 * @return 
	 */
	public static function get_user()
	{
		$CI =& get_instance();
		if($CI->tank_auth)
		{
			return $CI->tank_auth->userinfo();
		}
	}
	
    public static function get_cats()
	{
		$CI =& get_instance();
		$CI->load->model('cat_model', 'cat');
		$cats = array();
		$res = $CI->cat->fetch(array('status' => 1), 'status,id,title');
		if($res)
		{
			foreach($res as $v)
			{
				$cats[$v['id']] = $v['title'];
			}
		}
		return $cats;
	}
}

