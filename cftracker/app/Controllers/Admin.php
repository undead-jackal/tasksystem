<?php

namespace App\Controllers;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;


class Admin extends BaseController
{
  use ResponseTrait;
	protected $request;
	public function index(){
		return $this->loadLayout('content/admin/admin');
	}

  public function create(){
    if ($this->request->isAjax()) {
        $data = array(
          "first_name" =>$this->request->getPost("fname"),
          "last_name"=>$this->request->getPost("lname"),
          "company_name"=>$this->request->getPost("company"),
          "type"=>$this->request->getPost("type"),
          "contact"=>$this->request->getPost("contact"),
          "email"=>$this->request->getPost("email"),
          "created_by"=>1
        );
        $insert = $this->model->insertData($data, "account");
      $result=array(
        "insert" => $insert,
      );
      return $this->respond($result,200);
    }
  }

  public function getSpecific(){
    if ($this->request->isAjax()) {
      $params['select'] = "item.id, item.name, item.price, stock_movements.qty";
      $params['where'] = array(
        "stock_movements.item_id" => $this->request->getPost('id')
      );
      $params['join'] = array(
         array(
           "table" => "item",
           "on" => "item.id = stock_movements.item_id"
         ),
      );
      $data = $this->model->getData($params, "stock_movements")[0];
      $return = array(
        'result' => $data,
      );
      return $this->respond($return,200);
    }
  }

  public function getSpecificItem(){
    if ($this->request->isAjax()) {
      $params['where'] = array(
        "id" => $this->request->getPost('id')
      );
      $data = $this->model->getData($params, "account")[0];
      $return = array(
        'result' => $data,
      );
      return $this->respond($return,200);
    }
  }

  public function updateItem(){
    if ($this->request->isAjax()) {
      $data = array(
        "first_name" =>$this->request->getPost("fname"),
        "last_name"=>$this->request->getPost("lname"),
        "company_name"=>$this->request->getPost("company"),
        "type"=>$this->request->getPost("type"),
        "contact"=>$this->request->getPost("contact"),
        "email"=>$this->request->getPost("email"),
        "created_by"=>1
      );
      $where = array(
        "id" => $this->request->getPost('id')
      );
      $update = $this->model->updateData($data,$where, "account");
      $return = array(
        'result' => $update,
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
      $update = $this->model->updateData($data,$where, "account");
      $return = array(
        'result' => $update,
      );
      return $this->respond($return,200);
    }
  }

  public function view(){
    if ($this->request->isAjax()) {
      $params['where'] = array("account.is_deleted" => 0);
      $params['select'] = "user_info.id, user_info.first_name as fname, user_info.last_name as lname, account.first_name,account.last_name, account.company_name, account.id as a_id, type,account.email,account.contact,account.date_added";
      $params['limit'] = $this->request->getPost("per_page");
      $params['order'] = array('id', 'ASC');

      $params['offset'] = ($this->request->getPost("offset") != 0) ? $this->request->getPost("offset")+1:0;
      $params['join'] = array(
         array(
           "table" => "user_info",
           "on" => "user_info.user_credentials = account.created_by"
         ),
      );
      $data = $this->model->getData($params, "account");
      $data_lock = count($this->model->getData($params, "account"));
      $return = array(
        'tableReturn' => $data,
        'totalTable' => ceil($data_lock / $params['limit'])
      );
      return $this->respond($return,200);
    }
  }
}

?>
