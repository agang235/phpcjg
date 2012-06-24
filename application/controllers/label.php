<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Label extends CI_Controller {
	
	private $userinfo = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('label_model', 'label');
		$this->tank_auth->require_login(); //if not login,redirect to login
		$this->userinfo = $this->tank_auth->userinfo(); //get user's information
	}
	
	/**
	 * 首页
	 * @return 
	 */
	public function index($id = '')
	{
		$data['userinfo'] = $this->userinfo;
		$data['list'] = $this->label->fetch($where, 'id,name,desc');
		$this->load->view('label', $data);
	}
	
	/**
	 * 得到一个label id的名字
	 * @param object $id
	 * @return 
	 */
	function ajax($id)
	{
		$label = $this->label->fetch_one(array('id' => $id), 'name');
		echo $label['name'];
	}
	
	/**
	 * add and process add
	 * 
	 * @return 
	 */
	function add()
	{
		$label = $this->input->post('label');
		$this->form_validation->set_rules('label[name]', 'label name', 'trim|required|xss_clean|callback__check_label_name');
		if($label)
		{
			$data['suc'] = FALSE;
			if ($this->form_validation->run())
			{
				$res = $this->label->save($label);
			}
			
			if($res)
			{
				$data['id'] = $res;
				$data['msg'] = 'add success';
				$data['suc'] = TRUE;
			}
			else
			{
				$data['msg'] =  form_error('label[name]', '<div class="err fl">', '</div>');
			}
			echo json_encode($data);
			exit();
		}
		
		$this->load->view('label_form', $data);
	}
	
	/**
	 * edit and process edit 
	 * 
	 * @param object $id
	 * @return 
	 */
	function edit($id)
	{
		$id = intval($id);
		
				
		$label = $this->input->post('label');
		if($label)
		{
			$res = $this->label->save($label, array('id' => $id));
			if($res)
			{
				Lib::flash_in(array('msg' => 'success', 'suc' => TRUE));
				redirect('label/index');
			}
			else
			{
				Lib::flash_in(array('msg' => 'error', 'suc' => FALSE));
			}
			
		}
		
		$data['row'] = $this->label->fetch_one(array('id' => $id));
		$this->load->view('label_form', $data);
	}
	
	/**
	 * del
	 * 
	 * @param object $id
	 * @return 
	 */
	function del($id)
	{
		$data['suc'] = FALSE;
		if(Lib::is_post())
		{
			$res = $this->label->delete(array('id' => $id));
			if($res)
			{
				$data['msg'] = 'delete success';
				$data['suc'] = TRUE;
			}
			else
			{
				$data['msg'] = 'delete failed';
			}
		}
		else
		{
			$data['msg'] = 'invalid request';
		}
		echo json_encode($data);
	}
	
	/**
	 * 验证标签不可重名
	 * 附加验证规则
	 * @param object $name
	 * @return 
	 */
	function _check_label_name($name)
	{
		if ($this->label->fetch_one(array('name' => $name))) {
			$this->form_validation->set_message('_check_label_name', 'duplicate name');
			return FALSE;
		}
		return TRUE;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */