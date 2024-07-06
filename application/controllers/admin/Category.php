<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category extends CI_Controller {
	public function __construct(){
        parent::__construct();
       check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
       $this->load->model('category_model');
    }
    public function index()
    {
        $data = array();
        $data['page_title'] = 'Category';
        $data['country'] = $this->common_model->select('country');
        //$data['power'] = $this->common_model->get_all_power('user_power');
        $data['main_content'] = $this->load->view('admin/category/add', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- add new city by admin
    public function add()
    {   
        if ($_POST) {

            $data = array(
                'category_name' => $_POST['category_name'],                             
                'status' => $_POST['status'],               
                'created_at' => current_datetime()
            );

            $data = $this->security->xss_clean($data);
            
            //-- check duplicate email
            $category_name = $this->category_model->check_category($_POST['category_name']);

            if (empty($category_name)) {
                $user_id = $this->common_model->insert($data, 'category');
            
                /*if ($this->input->post('role') == "user") {
                    $actions = $this->input->post('role_action');
                    foreach ($actions as $value) {
                        $role_data = array(
                            'user_id' => $user_id,
                            'action' => $value
                        ); 
                       $role_data = $this->security->xss_clean($role_data);
                       $this->common_model->insert($role_data, 'user_role');
                    }
                }*/
                $this->session->set_flashdata('msg', 'Category added Successfully');
                redirect(base_url('admin/category/all_category_list'));
            } else {
                $this->session->set_flashdata('error_msg', 'Category already exist, try another name');
                redirect(base_url('admin/category'));
            }
            
            
            

        }
    }

    public function all_category_list()
    {
	 $data['page_title'] = 'All Categories';
        $data['categories'] = $this->category_model->get_all_category();
        //$data['country'] = $this->common_model->select('country');
        //$data['count'] = $this->common_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/category/categories', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- update users info
    public function update($id)
    {
        if ($_POST) {

            $data = array(
                'category_name' => $_POST['category_name'],
                'status' => $_POST['status']
               
            );
            $data = $this->security->xss_clean($data);

            /*$powers = $this->input->post('role_action');
            if (!empty($powers)) {
                $this->common_model->delete_user_role($id, 'user_role');
                foreach ($powers as $value) {
                   $role_data = array(
                        'user_id' => $id,
                        'action' => $value
                    ); 
                   $role_data = $this->security->xss_clean($role_data);
                   $this->common_model->insert($role_data, 'user_role');
                }
            }*/
            $category_name = $this->category_model->check_category($_POST['category_name'],$id);
            if($category_name){
                $this->session->set_flashdata('error_msg', 'Category Already Exists');
                redirect(base_url('admin/category/all_category_list'));
            }
            $this->common_model->edit_option($data, $id, 'category');
            $this->session->set_flashdata('msg', 'Category Updated Successfully');
            redirect(base_url('admin/category/all_category_list'));

        }
		
        $data['category'] = $this->category_model->get_category_info($id);                
        $data['main_content'] = $this->load->view('admin/category/edit_category', $data, TRUE);
	$data['page_title'] = 'Edit Category';
        $this->load->view('admin/index', $data);
        
    }

    
    //-- active Category
    public function active($id) 
    {
        $data = array(
            'status' => 1
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id,'category');
        $this->session->set_flashdata('msg', 'Category activated Successfully');
        redirect(base_url('admin/category/all_category_list'));
    }

    //-- deactive Category
    public function deactive($id) 
    {
        $data = array(
            'status' => 0
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id,'category');
        $this->session->set_flashdata('msg', 'Category deactivated Successfully');
        redirect(base_url('admin/category/all_category_list'));
    }

    //-- delete user
    public function delete($id)
    {
        $this->common_model->delete($id,'category'); 
        $this->session->set_flashdata('msg', 'Category deleted Successfully');
        redirect(base_url('admin/category/all_category_list'));
    }


   


}