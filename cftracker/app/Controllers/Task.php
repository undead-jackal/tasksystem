<?php

namespace App\Controllers;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;


class Task extends BaseController
{
  use ResponseTrait;
	protected $request;
	public function index(){
		return $this->loadLayout('content/task/task');
	}

  public function saveTask()
  {
    if ($this->request->isAjax()) {
      $data = array(
        "content"=>$this->request->getPost("content"),
        "status"=>$this->request->getPost("status"),
      );
      $where = array(
        "id" => $this->request->getPost('id')
      );
      $update = $this->model->updateData($data,$where, "task");
      $return = array(
        'insert' => $update,
      );
      return $this->respond($return,200);
    }
  }

  public function getTask(){
    if ($this->request->isAjax()) {
      $params['where'] = array(
        "task.id" => $this->request->getPost('id')
      );
      $params['select'] = "user_info.first_name, user_info.last_name, project.name, project.type,task.id, task.name as t_name,task.status,task.deadline,task.content,task.instruction, (SELECT first_name FROM user_info WHERE user_credentials = task.assign_to) as fname,(SELECT last_name FROM user_info WHERE user_credentials = task.assign_to) as lname";
      $params['join'] = array(
         array(
           "table" => "user_info",
           "on" => "user_info.user_credentials = task.assign_by"
         ),
         array(
           "table" => "project",
           "on" => "project.id = task.project_id"
         ),
      );
      $data = $this->model->getData($params, "task")[0];
      $return = array(
        'result' => $data,
      );
      return $this->respond($return,200);
    }
  }
  public function view(){
    if ($this->request->isAjax()) {
      $params['where'] = array("task.is_deleted" => 0,"task.assign_to" => $this->session->get("user_id"));
      $params['limit'] = $this->request->getPost("per_page");
      $params['order'] = array('id', 'ASC');
      $params['select'] = "user_info.first_name, user_info.last_name, project.name, project.type,task.id, task.name as t_name,task.status,task.deadline, (SELECT first_name FROM user_info WHERE user_credentials = task.assign_to) as fname,(SELECT last_name FROM user_info WHERE user_credentials = task.assign_to) as lname";
      $params['offset'] = ($this->request->getPost("offset") != 0) ? $this->request->getPost("offset"):0;
      $params['join'] = array(
         array(
           "table" => "user_info",
           "on" => "user_info.user_credentials = task.assign_by"
         ),
         array(
           "table" => "project",
           "on" => "project.id = task.project_id"
         ),
      );
      $data = $this->model->getData($params, "task");
      $params1['where'] = array("is_deleted" => 0);
      $data_lock = count($this->model->getData($params1, "task"));
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
