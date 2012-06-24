<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jingshu extends CI_Controller {
	
	private $userinfo = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->model('jingshu_model', 'jingshu');
		$this->load->model('cat_model', 'cat');
		$this->load->model('label_model', 'label');
		$this->tank_auth->require_login(); //if not login,redirect to login
		$this->userinfo = $this->tank_auth->userinfo(); //get user's information
	}
	
	/**
	 * 首页
	 * @return 
	 */
	public function index($lid = 1, $jid = 0)
	{
	    if($lid)
		{
			$where["INSTR(label, ',{$lid},')"] = NULL;
		}
		if($jid)
		{
			$where['id'] = $jid;
			$data['is_detail'] = TRUE;
		}
		//$where['cid'] = CAT_JINGSHU_ID;
		$data['list'] = $this->jingshu->fetch($where, 'id,cid,ask,title,answer,label', 'uptime desc');
		$data['labels'] = $this->label->fetch();
		$data['userinfo'] = $this->userinfo;

		$this->load->view('jingshu', $data);
	}
	
   /**
	 * 分类
	 * @return 
	 */
	public function cat($cid)
	{
		$where['cid'] = $cid;
		$data['list'] = $this->jingshu->fetch($where, 'id,cid,ask,title,answer,label', 'uptime desc');
		$data['labels'] = $this->label->fetch();
		$data['userinfo'] = $this->userinfo;

		$this->load->view('jingshu', $data);
	}

	
	/**
	 * add and process add
	 * 
	 * @return 
	 */
	function add()
	{
		$this->load->helper('form');
		
		$jingshu = $this->input->post('jingshu');
		if($jingshu)
		{
			$jingshu['create_uid'] = $this->userinfo['uid'];
			$jingshu['uptime'] = time();
			$res = $this->jingshu->save($jingshu);
			if($res)
			{
				Lib::flash_in(array('msg' => 'success', 'suc' => TRUE));
				redirect('cat/'.$jingshu['cid']);
			}
			else
			{
				Lib::flash_in(array('msg' => 'error', 'suc' => FALSE));
				$data['row'] = $jingshu;
			}
			
		}
		
		$data['cats'] = $this->cat->fetch(array('pid' => 0));
		$data['labels'] = $this->label->fetch();
		$data['userinfo'] = $this->userinfo;

		$this->load->view('jingshu_form', $data);
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
		$this->load->helper('form');
				
		$jingshu = $this->input->post('jingshu');
		if($jingshu)
		{
			$jingshu['uptime'] = time();
			$res = $this->jingshu->save($jingshu, array('id' => $id));
			if($res)
			{
				Lib::flash_in(array('msg' => 'success', 'suc' => TRUE));
				redirect('cat/'.$jingshu['cid']);
			}
			else
			{
				Lib::flash_in(array('msg' => 'error', 'suc' => FALSE));
			}
			
		}
		
		$data['cats'] = $this->cat->fetch(array('pid' => 0));
		$data['row'] = $this->jingshu->fetch_one(array('id' => $id));
		$data['labels'] = $this->label->fetch();
		$data['userinfo'] = $this->userinfo;

		$this->load->view('jingshu_form', $data);
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
			$res = $this->jingshu->delete(array('id' => $id));
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */