<?php namespace App\Controllers;
use CodeIgniter\Controller;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;
class Profile extends BaseController
{
	use ResponseTrait;
	protected $request;

	public function index($id){
		$content ="content/profile/profile";
		return $this->loadLayout($content);
	}

  public function getProfile()
  {
    if ($this->request->isAjax()) {
      $params['where'] = array(
        "user_info.user_credentials" => $this->request->getPost('id')
      );
      $params['join'] = array(
         array(
           "table" => "user",
           "on" => "user.id = user_info.user_credentials"
         ),
      );
      $data = $this->model->getData($params, "user_info")[0];
      $return = array(
        'result' => $data,
      );
      return $this->respond($return,200);
    }
  }

  public function saveProfile(){
    if ($this->request->isAjax()) {
      $data1 = array(
        "username" =>$this->request->getPost("username"),
        "password"=>$this->request->getPost("password"),
      );
      $where1 = array(
        "id" => $this->request->getPost('id')
      );
      $update1 = $this->model->updateData($data1,$where1, "user");
      $data = array(
        "codename" =>$this->request->getPost("codename"),
      );
      $where = array(
        "user_credentials" => $this->request->getPost('id')
      );
      $update = $this->model->updateData($data,$where, "user_info");
      $return = array(
        'result' => $update,
      );
      return $this->respond($return,200);
    }
  }
}
?>
