<?
class user_model extends MY_Model {
	protected $table_name = 'users';
	protected $order_by = 'name';
	public $rules = array(
	'email' => array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email|xss_clean'),
	'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|xss_clean|required'
		)
		
	);
	
	function __construct() 
	{
		parent::__construct();
	}
	
	public function login(){
		$user = $this->get_by(array(
			'email' => $this->input->post('email'),
			'password' => $this->hash($this->input->post('password')),
			), TRUE);
			
			if(count($user)) {
				$data = array(
					'name' => $user->name,
					'email' => $user->email,
					'id' => $user->id,
					'loggedin' => TRUE,
					);
				$this->session->set_userdata($data);
				return TRUE;
			}
	}
	
	public function loggedin(){
		return (bool) $this->session->userdata('loggedin');
	}

	public function check_user_pass($password){
	return (bool) $this->get_by(array('id'=>$this->session->userdata('id'),'password'=>$this->hash($password)));
	}


public function save_pass($password)
{
return (bool) $this->save(array('password'=>$this->hash($password)),$this->session->userdata('id'));
}
	
	public function logout(){
		$this->session->sess_destroy();
	}
	
	public function hash($string){
		return md5($string);
	}
}
?>