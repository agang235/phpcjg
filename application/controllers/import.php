<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('test', TRUE);
		$this->load->library('php_excel');
		//$this->load->library('reflc');
		//$this->output->enable_profiler(TRUE);
	}
	
	function index($table = '', $file = 'test_data/logic.xls')
	{
		//var_dump(Reflc::get_declared_classes());

		$inputFileName = $file;
		if (!file_exists($inputFileName)) {
			exit("Please Be sure {$inputFileName} exists.\n");
		}
		$objReader = new PHPExcel_Reader_Excel5();
		$objReader->setReadDataOnly(true);
		
		$objPHPExcel = $objReader->load($inputFileName);
		$data['objWorksheet'] = $objPHPExcel->getActiveSheet();
		
		$data['tables'] = $this->_get_tables();
		if($table)
		{
			$data['fields'] = $this->_get_fields($table);
		}
		
		$this->load->view('import/list_table', $data);
	}
    /**
     * 进行保存
     * @param object $file [optional]
     * @return 
     */
	function save($file = 'test_data/logic.xls')
	{
		$fields = $this->input->post('field');//字段与列对应关系
		$rows = $this->input->post('row'); //关注的行
		$table = $this->input->post('table');;//要操作的数据表
		
		if(!($fields && $rows))
		{
			echo '请重新填写';
			redirect('import/index');
		}
		
		$inputFileName = $file;
		if (!file_exists($inputFileName)) {
			exit("Please Be sure {$inputFileName} exists.\n");
		}
		$objReader = new PHPExcel_Reader_Excel5();
		$objReader->setReadDataOnly(true);
		
		$objPHPExcel = $objReader->load($inputFileName);
		$objWorksheet = $objPHPExcel->getActiveSheet();
		foreach($objWorksheet->getRowIterator() as $index => $row)
		{
			$tmp = array();
			if(in_array($index-1, $rows))//选中的行,保存;注意 excel起始行从1开始
			{
				$cellIterator = $row->getCellIterator();
  				$cellIterator->setIterateOnlyExistingCells(FALSE);
				foreach ($cellIterator as $key => $cell) 
				{
					if(array_key_exists($key, $fields))
					{
						if($v = $cell->getValue())
						{
							$tmp[$fields[$key]] = $v;
						}
						else//如果该值为给出，如何处理
						{
							//$tmp[$fields[$key]] = '';
						}
					}
  				}
			}
			if($tmp)
			{
				$sql[] = $this->db->insert_string($table, $tmp); 
			}
		}
		$data['suc'] = FALSE;
		if($sql)
		{
			$res = $this->_save_db($sql);
			if($res)
			{
				$data['suc'] = TRUE;
			}
			else
			{
				$data['msg'] = '保存数据失败';
			}
		}
		else
		{
			$data['msg'] = '无有效数据';
		}
		echo json_encode($data);
	}
	
	/**
	 * 获取数据库中的表
	 * @return 
	 */
	function _get_tables()
	{
		return $this->db->list_tables();
	}
	
	function get_fields($table)
	{
		$this->output->enable_profiler(FALSE);
		echo  json_encode($this->db->list_fields($table)) ;
	}
	
	/**
	 * 执行保存，此处应在模型之中
	 * 本例特殊，只为测试
	 * @param object $sql_arr
	 * @return 
	 */
	function _save_db($sql_arr)
	{
		$this->db->trans_begin();
		
		foreach($sql_arr as $sql)
		{
			$res = $this->db->query($sql);
		}
		
		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
			return false;
		}
		else
		{
		    $this->db->trans_commit();
			return true;
		}
	}
}
