<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * extend loader
 * 
 * DO NOT USE THIS FILE ON YOUR SERVER UNLESS YOU REALLY KNOW WHAT ARE YOU DOING!
 */
class MY_Loader extends CI_Loader{
	
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * get loaded models
	 * 
	 * Have to use public
	 * @return 
	 */
    public function get_ci_models()
	{
		return $this->_ci_models;
	}
}