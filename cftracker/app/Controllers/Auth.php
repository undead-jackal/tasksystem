<?php namespace App\Controllers;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;


class Auth extends BaseController
{
  use ResponseTrait;
	protected $request;
	public function index(){
		return $this->loadLayout('content/auth/login',array(),false,false,false);
	}

  public function handleLogin(){
    if ($this->request->isAjax()) {
      $params['where'] = array(
        "username" => $this->request->getPost("username"),
        "password" => $this->request->getPost("password")
      );
      $result = $this->model->getData($params, "user")[0];
      if ($result) {
        $this->session->set('user_id',$result['id']);
        $this->session->set('type',$result['type']);
      }
      $return = array('is-logged' => true);
    
      return $this->respond($return,200);
    }
  }

  public function logout(){
      $this->session->remove(array("user_id", "type"));
      return redirect()->to('/');
 }

	//--------------------------------------------------------------------

}
