<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity_model extends My_Model {

    public $model = 'activity';

    public function __construct()
    {
        parent::__construct();

        $this->setModel($this->model);
    }  
    
    public function save($data,$id = '')
    {
    	if ($id) {
    		$this->update($data, array('id' => $id));
    	}else{
    		$this->add($data);
    	}
    }
}

/* End of file activity_model.php */
/* Location: ./application/models/activity_model.php */