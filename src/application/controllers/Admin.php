<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public $CI = NULL;
 	public function __construct(){
    parent::__construct();
		$this->CI = & get_instance();
		$this->load->helper(array('form', 'url'));
		$this->load->model('Master_model');
		$this->load->model('Admin_model');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->library('upload');


   }
   public function index(){
			$this->load->view('admin/header.php');
			$this->load->view('admin/index',array('orders' => 0, 'employees' => 0, 'services' => 0));
			$this->load->view('admin/footer.php');
	}

	public function delete_product($id){
			$data = array(
				'dl' => 1
			);
			$id = $this->Master_model->update_record(PRODUCT_TABLE,$id,$data);
			redirect('admin/products');
			die();
	}

	public function delete_category($id){
			$data = array(
				'dl' => 1
			);
			$id = $this->Master_model->update_record(CATEGORY_TABLE,$id,$data);
			redirect('admin/category');
			die();
	}

	public function delete_sub_category($id){
			$data = array(
				'dl' => 1
			);
			$id = $this->Master_model->update_record(CATEGORY_TABLE,$id,$data);
			redirect('admin/sub_category');
			die();
	}

	public function add_category(){
			if($this->input->post('submit') == "submit"){
				$name = $this->input->post('name');
				$data = array(
					'name' => $name
				);
				$id = $this->Master_model->insert_data(CATEGORY_TABLE,$data);
				redirect('admin/category');
				die();
			}else{
				$this->load->view('admin/header.php');
				$this->load->view('admin/category/add');
				$this->load->view('admin/footer.php');
			}
	}

	public function edit_category($id){
			if($this->input->post('submit') == "submit"){
				$name = $this->input->post('name');
				$data = array(
					'name' => $name
				);
				$id = $this->Master_model->update_record(CATEGORY_TABLE,$id,$data);
				redirect('admin/category');
				die();
			}else{
				$category = $this->Master_model->fetch_record(CATEGORY_TABLE,"*",array('id' => $id));
				$this->load->view('admin/header.php');
				$this->load->view('admin/category/edit',array('category' => $category[0]));
				$this->load->view('admin/footer.php');
			}
	}

	public function add_sub_category(){
			if($this->input->post('submit') == "submit"){
				$name = $this->input->post('name');
				$parent_id = $this->input->post('parent_id');
				$data = array(
					'name' => $name,
					'parent_id' => $parent_id
				);
				$id = $this->Master_model->insert_data(SUB_CATEGORY_TABLE,$data);
				redirect('admin/sub_category');
				die();
			}else{
				$where = array(
					'dl' => 0
				);
				$category = $this->Master_model->fetch_record(CATEGORY_TABLE,"*",$where);
				$this->load->view('admin/header.php');
				$this->load->view('admin/sub_category/add',array('category' => $category));
				$this->load->view('admin/footer.php');
			}
	}

	public function edit_sub_category($id){
			if($this->input->post('submit') == "submit"){
				$name = $this->input->post('name');
				$parent_id = $this->input->post('parent_id');
				$data = array(
					'name' => $name,
					'parent_id' => $parent_id
				);
				$id = $this->Master_model->update_record(SUB_CATEGORY_TABLE,$id,$data);
				redirect('admin/sub_category');
				die();
			}else{
				$where = array(
					'dl' => 0
				);
				$category = $this->Master_model->fetch_record(CATEGORY_TABLE,"*",$where);
				$sub_category = $this->Master_model->fetch_record(CATEGORY_TABLE,"*",array('id' => $id));
				$this->load->view('admin/header.php');
				$this->load->view('admin/sub_category/edit',array('category' => $category, 'sub_category' => $sub_category[0]));
				$this->load->view('admin/footer.php');
			}
	}

	public function category(){
		$this->load->view('admin/header.php');
		$this->load->view('admin/category/index');
		$this->load->view('admin/footer.php');
	}


	public function sub_category(){
		$this->load->view('admin/header.php');
		$this->load->view('admin/sub_category/index');
		$this->load->view('admin/footer.php');
	}

	public function get_category_data(){
		$id = ((isset($_GET['id'])) and $_GET['id'] != NULL) ? $_GET['id'] : 0;
		$offset = ((isset($_GET['offset'])) and $_GET['offset'] != NULL) ? $_GET['offset'] : 0;
		$limit = ((isset($_GET['limit'])) and $_GET['limit'] != NULL)? $limit = $_GET['limit'] : 10;
		$sort = ((isset($_GET['sort'])) and $_GET['sort'] != NULL) ? $_GET['sort'] : 'id';
		$order =  ((isset($_GET['order'])) and $_GET['order'] != NULL)? $_GET['order'] : 'DESC';
		$where = NULL;

		if(isset($_GET['search']) and $_GET['search'] != NULL){
				$where = " And (name LIKE '%".$_GET['search']."%' OR description LIKE '%".$_GET['search']."%' )";
		}
		$all_student_data = $this->Admin_model->get_category_data("" , "", $where);
		$srno = $offset + 1;
		$bulkData = array();
		$bulkData['total'] = count($all_student_data);
		$rows = array();
		$tempRow = array();
		$all_student_data = $this->Admin_model->get_category_data($offset, $limit, $where);
		foreach($all_student_data as $row){
			$action = '<div class="btn-group">
			<a href="'.base_url().'/admin/edit_category/'.$row->id.'" title="Edit Data" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
			<a href="'.base_url().'/admin/delete_category/'.$row->id.'" title="Delete Data" class="btn btn-danger btn-sm" onclick=" return delete_function()"><span class="glyphicon glyphicon-trash"></span></a>
		</div>';
			$tempRow['srno'] = $srno;
			$tempRow['name'] = $row->name;
			$tempRow['action'] = $action;
			$rows[] = $tempRow;
			$srno++;
		}

		$bulkData['rows'] = $rows;
		print_r(json_encode($bulkData));
	}



	public function get_sub_category_data(){
		$id = ((isset($_GET['id'])) and $_GET['id'] != NULL) ? $_GET['id'] : 0;
		$offset = ((isset($_GET['offset'])) and $_GET['offset'] != NULL) ? $_GET['offset'] : 0;
		$limit = ((isset($_GET['limit'])) and $_GET['limit'] != NULL)? $limit = $_GET['limit'] : 10;
		$sort = ((isset($_GET['sort'])) and $_GET['sort'] != NULL) ? $_GET['sort'] : 'id';
		$order =  ((isset($_GET['order'])) and $_GET['order'] != NULL)? $_GET['order'] : 'DESC';
		$where = NULL;

		if(isset($_GET['search']) and $_GET['search'] != NULL){
				$where = " And (name LIKE '%".$_GET['search']."%' OR description LIKE '%".$_GET['search']."%' )";
		}
		$all_student_data = $this->Admin_model->get_sub_category_data("" , "", $where);
		$srno = $offset + 1;
		$bulkData = array();
		$bulkData['total'] = count($all_student_data);
		$rows = array();
		$tempRow = array();
		$all_student_data = $this->Admin_model->get_sub_category_data($offset, $limit, $where);
		foreach($all_student_data as $row){
			$action = '<div class="btn-group">
			<a href="'.base_url().'/admin/edit_sub_category/'.$row->id.'" title="Edit Data" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
			<a href="'.base_url().'/admin/delete_sub_category/'.$row->id.'" title="Delete Data" class="btn btn-danger btn-sm" onclick=" return delete_function()"><span class="glyphicon glyphicon-trash"></span></a>
		</div>';
			$tempRow['srno'] = $srno;
			$tempRow['name'] = $row->name;
			$tempRow['parent'] = $row->parent_name;
			$tempRow['action'] = $action;
			$rows[] = $tempRow;
			$srno++;
		}

		$bulkData['rows'] = $rows;
		print_r(json_encode($bulkData));
	}

	public function products(){
		$this->load->view('admin/header.php');
		$this->load->view('admin/product/index');
		$this->load->view('admin/footer.php');
	}

	public function add_product(){
		if($this->input->post('submit') == "submit"){
			$name = $this->input->post('name');
			$category = $this->input->post('category');
			$sub_category = $this->input->post('sub_category');
			$price = $this->input->post('price');
			$in_stock = $this->input->post('in_stock');
			$description = $this->input->post('description');
			$files=$_FILES;
			$filename=$_FILES["image"]["name"];
			if(!empty($filename)){
				$_FILES["image"]["name"] =$files["image"]["name"];
				$_FILES["image"]["type"] =$files["image"]["type"];
				$_FILES["image"]["tmp_name"] =$files["image"]["tmp_name"];
				$_FILES["image"]["error"] =$files["image"]["error"];
				$_FILES["image"]["size"] =$files["image"]["size"];

				$config["upload_path"] = PRODUCT_IMAGE_PATH;
				$config["allowed_types"] = 'jpg|png|jpeg';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if($this->upload->do_upload('image')){
					$upload_data = $this->upload->data();
					$filename = $upload_data['file_name'];
				}else{
					$filename = "";
				}
			}else{
				$filename = "";
			}
			$data = array(
				'name' => $name,
				'image' => $filename,
				'category_id' => $category,
				'subcategory_id' => $sub_category,
				'description' => $description,
				'price' => $price,
				'in_stock' => $in_stock
			);

			$id = $this->Master_model->insert_data(PRODUCT_TABLE,$data);
			redirect('admin/products');
			die();
		}else{

			$where = array(
				'dl' => 0
			);

			$category = $this->Master_model->fetch_record(CATEGORY_TABLE,"*",$where);
			$sub_category = $this->Master_model->fetch_record(SUB_CATEGORY_TABLE,"*",$where);
			$this->load->view('admin/header.php');
			$this->load->view('admin/product/add', array('category' => $category, 'sub_category' => $sub_category));
			$this->load->view('admin/footer.php');
		}
	}

	public function edit_product($id){
		if($this->input->post('submit') == "submit"){
			$name = $this->input->post('name');
			$category = $this->input->post('category');
			$sub_category = $this->input->post('sub_category');
			$price = $this->input->post('price');
			$in_stock = $this->input->post('in_stock');
			$description = $this->input->post('description');
			$files=$_FILES;
			$filename=$_FILES["image"]["name"];
			if(!empty($filename)){
				$_FILES["image"]["name"] =$files["image"]["name"];
				$_FILES["image"]["type"] =$files["image"]["type"];
				$_FILES["image"]["tmp_name"] =$files["image"]["tmp_name"];
				$_FILES["image"]["error"] =$files["image"]["error"];
				$_FILES["image"]["size"] =$files["image"]["size"];

				$config["upload_path"] = PRODUCT_IMAGE_PATH;
				$config["allowed_types"] = 'jpg|png|jpeg';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if($this->upload->do_upload('image')){
					$upload_data = $this->upload->data();
					$filename = $upload_data['file_name'];
				}else{
					$filename = "";
				}
			}else{
				$filename = "";
			}
			$data = array(
				'name' => $name,
				'image' => $filename,
				'category_id' => $category,
				'subcategory_id' => $sub_category,
				'description' => $description,
				'price' => $price,
				'in_stock' => $in_stock
			);
			$id = $this->Master_model->update_record(PRODUCT_TABLE,$id,$data);
			redirect('admin/products');
			die();
		}else{
			$user_data = $this->Master_model->fetch_record(PRODUCT_TABLE,"*",array('id' => $id));
			if(isset($user_data[0]) and is_array($user_data)){
				$where = array(
					'dl' => 0
				);
				$category = $this->Master_model->fetch_record(CATEGORY_TABLE,"*",$where);
				$sub_category = $this->Master_model->fetch_record(SUB_CATEGORY_TABLE,"*",$where);
				$this->load->view('admin/header.php');
				$this->load->view('admin/product/edit',array('users' => $user_data[0], 'category' => $category, 'sub_category' => $sub_category));
				$this->load->view('admin/footer.php');
			}else{
				redirect('admin/users');
			}
		}
	}

	public function get_product_data(){
		$id = ((isset($_GET['id'])) and $_GET['id'] != NULL) ? $_GET['id'] : 0;
		$offset = ((isset($_GET['offset'])) and $_GET['offset'] != NULL) ? $_GET['offset'] : 0;
		$limit = ((isset($_GET['limit'])) and $_GET['limit'] != NULL)? $limit = $_GET['limit'] : 10;
		$sort = ((isset($_GET['sort'])) and $_GET['sort'] != NULL) ? $_GET['sort'] : 'id';
		$order =  ((isset($_GET['order'])) and $_GET['order'] != NULL)? $_GET['order'] : 'DESC';
		$where = NULL;

		if(isset($_GET['search']) and $_GET['search'] != NULL){
				$where = " And (name LIKE '%".$_GET['search']."%' OR description LIKE '%".$_GET['search']."%' )";
		}
		$all_student_data = $this->Admin_model->get_product_data("" , "", $where);
		$srno = $offset + 1;
		$bulkData = array();
		$bulkData['total'] = count($all_student_data);
		$rows = array();
		$tempRow = array();
		$all_student_data = $this->Admin_model->get_product_data($offset, $limit, $where);
		foreach($all_student_data as $row){
			$action = '<div class="btn-group">
			<a href="'.base_url().'/admin/edit_product/'.$row->id.'" title="Edit Data" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
			<a href="'.base_url().'/admin/delete_product/'.$row->id.'" title="Delete Data" class="btn btn-danger btn-sm" onclick=" return delete_function()"><span class="glyphicon glyphicon-trash"></span></a>
			<a href="'.base_url().'/admin/view_product/'.$row->id.'" title="View Data" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
		</div>';
			$tempRow['srno'] = $srno;
			$tempRow['name'] = $row->name;
			$tempRow['category_id'] = $row->category_name;
			$tempRow['subcategory_id'] = $row->sub_category_name;
			$tempRow['description'] = $row->description;
			$tempRow['price'] = $row->price;
			$tempRow['in_stock'] = $row->in_stock;
			$tempRow['action'] = $action;
			$rows[] = $tempRow;
			$srno++;
		}

		$bulkData['rows'] = $rows;
		print_r(json_encode($bulkData));
	}

	public function view_product($id){
		$user_data = $this->Master_model->fetch_record(PRODUCT_TABLE,"*",array('id' => $id));
		if(isset($user_data[0]) and is_array($user_data)){
			$where = array(
				'dl' => 0
			);
			$category = $this->Master_model->fetch_record(CATEGORY_TABLE,"*",$where);
			$sub_category = $this->Master_model->fetch_record(SUB_CATEGORY_TABLE,"*",$where);
			$this->load->view('admin/header.php');
				$this->load->view('admin/product/view',array('users' => $user_data[0], 'category' => $category, 'sub_category' => $sub_category));
			$this->load->view('admin/footer.php');
		}else{
			redirect('admin/users');
		}
	}
}
