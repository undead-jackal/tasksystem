<?php

namespace App\Controllers;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;


class Project extends BaseController
{
  use ResponseTrait;
	protected $request;
	public function index(){
		return $this->loadLayout('content/project/project');
	}

  public function create(){
    if ($this->request->isAjax()) {
        $data = array(
          "name"=>$this->request->getPost("project"),
          "type"=>$this->request->getPost("type"),
          "account_owner"=>$this->request->getPost("account"),
          "deadline"=>$this->request->getPost("deadline"),
          "created_by"=>$this->session->get("user_id")
        );
        $insert = $this->model->insertData($data, "project");

      return $this->respond($insert,200);
    }
  }

  public function getSpecificItem(){
    if ($this->request->isAjax()) {
      $params['where'] = array(
        "id" => $this->request->getPost('id')
      );
      $data = $this->model->getData($params, "project")[0];
      $return = array(
        'result' => $data,
      );
      return $this->respond($return,200);
    }
  }

  public function remove(){
    if ($this->request->isAjax()) {
      $data = array(
        "is_deleted" => 1,
      );
      $where = array(
        "id" => $this->request->getPost('id')
      );
      $update = $this->model->updateData($data,$where, "project");
      $return = array(
        'result' => $update,
      );
      return $this->respond($return,200);
    }
  }

  public function update()
  {
    if ($this->request->isAjax()) {
      $data = array(
        "name"=>$this->request->getPost("project"),
        "type"=>$this->request->getPost("type"),
        "account_owner"=>$this->request->getPost("account"),
        "deadline"=>$this->request->getPost("deadline"),
      );
      $where = array(
        "id" => $this->request->getPost('id')
      );
      $update = $this->model->updateData($data,$where, "project");
      $return = array(
        'result' => $update,
      );
      return $this->respond($return,200);
    }
  }

  public function view(){
    if ($this->request->isAjax()) {
      $params['where'] = array("project.is_deleted" => 0);
      $params['limit'] = $this->request->getPost("per_page");
      $params['order'] = array('id', 'ASC');
      $params['select'] = "*, project.id as p_id,project.type as p_type, project.status as p_status, user_info.first_name as fname, user_info.last_name as lname";
      $params['offset'] = ($this->request->getPost("offset") != 0) ? $this->request->getPost("offset"):0;
      $params['join'] = array(
         array(
           "table" => "user_info",
           "on" => "user_info.user_credentials = project.created_by"
         ),
         array(
           "table" => "account",
           "on" => "account.id = project.account_owner"
         ),
      );
      $data = $this->model->getData($params, "project");
      $params1['where'] = array("is_deleted" => 0);
      $data_lock = count($this->model->getData($params1, "project"));
      $return = array(
        'tableReturn' => $data,
        'totalTable' => ceil($data_lock / $params['limit']),
        'page' => $params['limit'],
      );
      return $this->respond($return,200);
    }
  }
}

?>
