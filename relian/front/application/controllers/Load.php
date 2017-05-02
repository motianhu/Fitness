<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Load extends CI_Controller {
	
	private $appId = '';
	private $appSecret = '';
	
	public function __construct() {
		parent::__construct ();
		
		$this->load->model ( 'user_model' );
		
		$this->appId = $this->config->item ( 'appId' );
		$this->appSecret = $this->config->item ( 'appSecret' );
		
		$this->load->library ( 'jssdk', array (
			'appId' => $this->appId,
			'appSecret' => $this->appSecret 
		) );
		
	}
	public function index($referer_url = '') {
			//refresh_token 过期,重新获取,获取openid,静默
			$redirect_url = urlencode(base_url().'load/oauth2');
			$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this->appId.
			'&redirect_uri='.$redirect_url.'&response_type=code&scope=snsapi_base&state=store#wechat_redirect';
			redirect($url);
	}
	
	//微信返回回调页面
	public function oauth2(){
		//微信返回数据
		$code = $this->input->get('code');
		
		$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$this->appId&secret=$this->appSecret&code=$code&grant_type=authorization_code";
		
		$sec = $this->jssdk->httpGet($url);
		$data = json_decode($sec,true);
		
		if( ! empty($data['openid']) ){
			$this->get_user_info($data['openid']);
		}
	}
	
	
	private function get_user_info($open_id){
		//获取token
		$access_token = $this->jssdk->getAccessToken();
		$url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$open_id.'&lang=zh_CN';
		$sec = $this->jssdk->httpGet($url);
		$data = json_decode($sec,true);
		
		if( ! empty($data['openid'])){
			//查询用户是否存在
			$info = $this->user_model->one(array('where'=>array('openid'=>$data['openid'])));
			
			$db_data = array(
					'nickname'	=>	$data['nickname'],
					'headimgurl'=>	$data['headimgurl'],
					'sex'		=>	$data['sex'],
					'city'		=>	$data['city'],
					'country'	=>	$data['country'],
					'province'	=>	$data['province'],
					'subscribe_time'=>$data['subscribe_time'],
					'remark'	=>	$data['remark']
			);
			//初次登录，新增用户
			if(empty($info)){
				$db_data['openid'] = $data['openid'];
				$this->user_model->add($db_data);
			}else{
				$this->user_model->update($db_data,array('openid'=>$data['openid']));
			}
			set_cookie('openid',$data['openid'],3600);			
			
			$data ['referer_url'] = base_url().get_cookie('uri_string');
			$this->template->display ( 'load/load.html', $data );
		}else{
			show_error('未获取到用户信息');
		}
	}
}
