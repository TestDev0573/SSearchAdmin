<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategory extends CI_Controller {

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
        $data['page_title'] = 'Sub Category';
        $data['category'] = $this->common_model->select('category');
        //$data['power'] = $this->common_model->get_all_power('user_power');
        $data['main_content'] = $this->load->view('admin/subcategory/add', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- add new sub by admin
    public function add()
    {   
        if ($_POST) {

            $data = array(
	          'cat_id' => $_POST['cat_id'],
                's_cat_name' => $_POST['s_cat_name'],                             
                'status' => $_POST['status'],               
                'created_at' => current_datetime()
            );

            $data = $this->security->xss_clean($data);
            
            //-- check duplicate cat
            $s_cat_name = $this->category_model->check_sub_category($_POST['s_cat_name'],$_POST['cat_id']);

            if (empty($s_cat_name)) {
                $user_id = $this->common_model->insert($data, 'tbl_sub_category');
            
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
                $this->session->set_flashdata('msg', 'Sub Category added Successfully');
                redirect(base_url('admin/subcategory/all_sub_category_list'));
            } else {
                $this->session->set_flashdata('error_msg', 'Sub Category already exist, try another name');
                redirect(base_url('admin/subcategory'));
            }           
            

        }
    }

    public function all_sub_category_list()
    {
	 $data['page_title'] = 'All Sub Categories';
        $data['sub_categories'] = $this->category_model->get_all_sub_category();
        //$data['country'] = $this->common_model->select('country');
        //$data['count'] = $this->common_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/subcategory/sub_categories', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- update users info
    public function update($id)
    {
        if ($_POST) {

            $data = array(
                 'cat_id' => $_POST['cat_id'],
                's_cat_name' => $_POST['s_cat_name'],                             
                'status' => $_POST['status'],               
                'created_at' => current_datetime()
               
            );
            $data = $this->security->xss_clean($data);
            $s_cat_name = $this->category_model->check_sub_category($_POST['s_cat_name'],$_POST['cat_id'],$id);
	        if($s_cat_name){
                $this->session->set_flashdata('error_msg', 'Sub Category already exist, try another name');
                redirect(base_url('admin/subcategory/all_sub_category_list'));
            }
            $this->common_model->edit_option($data, $id, 'tbl_sub_category');
            $this->session->set_flashdata('msg', 'Sub Category Updated Successfully');
            redirect(base_url('admin/subcategory/all_sub_category_list'));

        }
	    $data['category'] = $this->common_model->select('category');		
        $data['subcategory'] = $this->category_model->get_sub_category_info($id);                    
        $data['main_content'] = $this->load->view('admin/subcategory/edit_sub_category', $data, TRUE);
	    $data['page_title'] = 'Edit Sub Category';
        $this->load->view('admin/index', $data);
        
    }

    
    //-- active user
    public function active($id) 
    {
        $data = array(
            'status' => 1
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id,'tbl_sub_category');
        $this->session->set_flashdata('msg', 'Sub-Category activated Successfully');
        redirect(base_url('admin/subcategory/all_sub_category_list'));
    }

    //-- deactive user
    public function deactive($id) 
    {
        $data = array(
            'status' => 0
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id,'tbl_sub_category');
        $this->session->set_flashdata('msg', 'Sub-Category deactivated Successfully');
        redirect(base_url('admin/subcategory/all_sub_category_list'));
    }

    //-- delete user
    public function delete($id)
    {
        $this->common_model->delete($id,'tbl_sub_category'); 
        $this->session->set_flashdata('msg', 'Sub-Category deleted Successfully');
        redirect(base_url('admin/subcategory/all_sub_category_list'));
    }


   


}
