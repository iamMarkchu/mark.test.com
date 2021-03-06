<?php
class TemplateSmarty extends Smarty 
{
	function TemplateSmarty($project="",$tpl_dir="")
	{
		if($tpl_dir && substr($tpl_dir,0,1) != "/") $tpl_dir = INCLUDE_ROOT . $tpl_dir;
		$this->template_dir = $tpl_dir ? $tpl_dir : INCLUDE_ROOT . 'view';
		$this->compile_dir  = INCLUDE_ROOT . 'storage/smarty_c/' . $project;
		$this->cache_dir  = INCLUDE_ROOT . 'storage/smarty_cache/' . $project;

		if(!is_dir($this->compile_dir)) {
			$this->mkdir_and_chmod($this->compile_dir);
		}
		$this->left_delimiter = '<{';
		$this->right_delimiter = '}>';
		if($project == "" && defined("DEBUG_MODE") && DEBUG_MODE == false)
		{
			//for production, we dont check the new tpl, and always use compiled file.
			$this->compile_check = false;
		}
		
		//cache open
		$this->caching = false;
		if($this->caching)
		{
			if(!is_dir($this->cache_dir)) $this->mkdir_and_chmod($this->cache_dir);
		}
		parent::__construct();
	}
	
	function mkdir_and_chmod($_dir)
	{
		@mkdir($_dir,0777,true);
		@chmod($_dir,0777);
	}
	public function display($template = null, $cache_id = null, $compile_id = null, $parent = null)
    {
    	$categoryObj = new Category();
    	$navList = $categoryObj->getPrimaryCategory(6);
    	parent::assign("navList",$navList);
        parent::display($template);
    }
}

