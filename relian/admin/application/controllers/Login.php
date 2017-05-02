<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	private $code_sess = "code_admin_login";
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('code_model');
    }

    //登陆
    public function index()
    {
        $data['error'] = $this->input->get('error');
        $this->template->display('login.html',$data);
    }

    //检测登陆过程
    public function toLogin()
    {
    	$this->load->library('Account');
    	$this->load->model('admin_model');
    	$this->load->model('admin_role_priv_model');
    	    	
        $username = trim( $this->input->post('username') );
        $password = trim( $this->input->post('pwd') );
        $code = trim( $this->input->post('code') );      
        
        if( $username && $password && $code )
        { 
        	// 验证码判断
        	if ($this->session->userdata ( $this->code_sess ) != $code)
        	{
        		redirect(base_url().'?error=2');
        	}
        	
	        $where_arr = array(
	            'uname' => $username
	        );	
		    $ret = $this->admin_model->get($where_arr);
	
	        if ($ret['num'] != 0) {
	            $user = $ret['data'][0];
	            $checkPwd = get_check_pwd($password);
	
	            if ($checkPwd === $user['passwd']) {
	                $this->session->set_userdata('uid', $user['admin_id']);	
	                $this->session->set_userdata('username', $user['uname']);
	                
	                $user['pic_persion'] = empty($user['pic_persion']) ? base_url().'static/img/avatar1.jpg' : $user['pic_persion'];
	                $this->session->set_userdata('pic_persion', $user['pic_persion']);
	
	                $auth = $this->admin_role_priv_model->get_role_auth($user['role_id']);
	                
	                $this->session->set_userdata('login_dateline', date('H:i'));
	                $this->session->set_userdata('role_id', $user['role_id']);
	                $this->session->set_userdata('store_id', $user['store_id']);
	                $this->session->set_userdata('auth', $auth);
	
	            }else{
	                redirect(base_url().'?error=1');
	            }
	        }else{
	            redirect(base_url().'?error=1');
	        }
	        redirect(base_url().'welcome');
        }else{
        	redirect(base_url().'?error=1');
        }
    }

    /**
     * 验证码
     */
    public function refresh_code()
    {
    	$this->code_model->refresh_code ( $this->code_sess );
    }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
