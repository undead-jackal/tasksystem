<?php


namespace App\Controllers;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;


class Task_Admin extends BaseController
{
  use ResponseTrait;
	protected $request;
	public function index(){
		return $this->loadLayout('content/task_admin/task');
	}

  public function create(){
    if ($this->request->isAjax()) {
        $data = array(
          "name" =>$this->request->getPost("task"),
          "Project_id"=>$this->request->getPost("project"),
          "assign_by"=>$this->session->get("user_id"),
          "assign_to"=>$this->request->getPost("assign"),
          "deadline"=>$this->request->getPost("deadline"),
          "instruction"=>$this->request->getPost("instruction"),
        );
      $insert = $this->model->insertData($data, "task");
      $result=array(
        "insert" => $insert,
      );
      return $this->respond($result,200);
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
      $update = $this->model->updateData($data,$where, "task");
      $return = array(
        'result' => $update,
      );
      return $this->respond($return,200);
    }
  }

  public function getTask(){
    if ($this->request->isAjax()) {
      $params['where'] = array(
        "task.id" => $this->request->getPost('id')
      );
      $params['select'] = "codename, project.name, project.type,task.id, task.name as t_name,task.status,task.deadline,task.content,task.instruction, ";
      $params['join'] = array(
         array(
           "table" => "user_info",
           "on" => "user_info.user_credentials = task.assign_to"
         ),
         array(
           "table" => "project",
           "on" => "project.id = task.project_id"
         ),
      );
      $data = $this->model->getData($params, "task")[0];
      $return = array(
        'result' => $data,
        'query' => $this->model->getLastQuery()
      );
      return $this->respond($return,200);
    }
  }

  public function view(){
    if ($this->request->isAjax()) {
      $params['where'] = array("task.is_deleted" => 0);
      $params['limit'] = $this->request->getPost("per_page");
      $params['order'] = array('id', 'ASC');
      $params['select'] = "user_info.codename, project.name, project.type,task.id, task.name as t_name,task.status,task.deadline, (SELECT codename FROM user_info WHERE user_credentials = task.assign_to) as assign_codename,";
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
