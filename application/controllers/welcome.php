<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	private $userinfo = array();
	public function __construct()
	{
		parent::__construct();
		$this->tank_auth->require_login(); //if not login,redirect to login
		$this->userinfo = $this->tank_auth->userinfo(); //get user's information
	}
	/**
	 * 首页
	 * @return 
	 */
	public function index()
	{
		$data['userinfo'] = $this->userinfo;
		$data['menus'] = array( 
			array('url' => 'guben', 'title' => '孤本'),
			array('url' => 'zhenjing', 'title' => '真经'),
		);
		$this->load->view('welcome_message', $data);
	}
	
	/**
	 * test
	 * @return 
	 */
	function editor()
	{
		$data = array();
		if($_POST)
		{
			var_dump($_POST);
		}
		$this->load->view('test/editor_test', $data);
	}
	
 	function editor_normal()
	{
		$data = array();
		if($_POST)
		{
			var_dump($_POST);
		}
		$this->load->view('jishu_form', $data);
	}
	
	function jishu()
	{
		$this->load->model('jishu');
		$res = $this->jishu->fetch_one(array('id' => 1));
		var_dump($res);
	}
	
	function ip()
	{
		var_dump(getenv('REMOTE_ADDR'));
		var_dump(getenv('SERVER_ADDR'));
		
		var_dump($_SERVER['REMOTE_ADDR']);
		var_dump($_SERVER['SERVER_ADDR']);
		//var_dump($_SERVER);
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */