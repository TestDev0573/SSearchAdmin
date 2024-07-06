<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Locality extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('locality_model');
    }
    public function index()
    {
        $data = array();
        $data['page_title'] = 'Locality';
        $data['city'] = $this->common_model->select('cities');
        $data['power'] = $this->common_model->get_all_power('user_power');
        $data['main_content'] = $this->load->view('admin/locality/add', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- add new city by admin
    public function add()
    {   
        if ($_POST) {

            $data = array(
                'city_id' => $_POST['city'],
                'locality_name' => $_POST['locality_name'],
                'locality_region_code' => $_POST['region_name'].'-'.rand(),              
                'status' =>1,               
                'creation_date' => current_datetime()
            );

            $data = $this->security->xss_clean($data);
            //-- check duplicate Locality
            $locality_name = $this->locality_model->check_locality($_POST['locality_name'], $_POST['city']);
            if (empty($locality_name)) {
                $locality_id = $this->common_model->insert($data,'tbl_locality');
            
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
                $this->session->set_flashdata('msg', 'Locality added Successfully');
                redirect(base_url('admin/locality/all_locality_list'));
            } else {
                $this->session->set_flashdata('error_msg', 'Locality already exist, try another name');
                redirect(base_url('admin/locality'));
            }
            
            
            

        }
    }

    public function all_locality_list()
    {
	 	$data['page_title'] = 'All Localities';
        $data['localities'] = $this->locality_model->get_all_locality();
       // $data['country'] = $this->common_model->select('country');
        //$data['count'] = $this->locality_model->get_locality_total();
        $data['main_content'] = $this->load->view('admin/locality/localities', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- update users info
    public function update($id)
    {
        if ($_POST) {
            $data = array(
                'locality_name' => $_POST['locality'],
                'city_id' => $_POST['city'],
                'status' => 1
            );
            $data = $this->security->xss_clean($data);
            $powers = $this->input->post('role_action');
            // if (!empty($powers)) {
            //     $this->common_model->delete_user_role($id, 'user_role');
            //     foreach ($powers as $value) {
            //        $role_data = array(
            //             'user_id' => $id,
            //             'action' => $value
            //         ); locality_name
            //        $role_data = $this->security->xss_clean($role_data);locality_name
            //        $this->common_model->insert($role_data, 'user_role');
            //     }
            // }
            $locality_name = $this->locality_model->check_locality($_POST['locality'], $_POST['city'],$id);
            if($locality_name){
                $this->session->set_flashdata('error_msg', 'Locality already exits.Please try another.');
                redirect(base_url('admin/locality/all_locality_list'));
            }
                $this->common_model->edit_option($data, $id, 'tbl_locality');
                $this->session->set_flashdata('msg', 'Locality Updated Successfully');          
                redirect(base_url('admin/locality/all_locality_list'));

        }
		
       // $data['user'] = $this->common_model->get_single_user_info($id);
       // print_r($data['user']);
      //  $data['user_role'] = $this->common_model->get_user_role($id);
        //$data['power'] = $this->common_model->select('user_power');
        $data['cities'] = $this->common_model->select('cities');
        $data['locality'] = $this->locality_model->get_locality_info($id); 
        $data['main_content'] = $this->load->view('admin/locality/edit_locality', $data, TRUE);
		$data['page_title'] = 'Edit Locality';
        $this->load->view('admin/index', $data);
        
    }

    
    //-- active Locality
    public function active($id) 
    {
        $data = array(
            'status' => 1
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id,'tbl_locality');
        $this->session->set_flashdata('msg', 'Locality active Successfully');
        redirect(base_url('admin/locality/all_locality_list'));
    }

    //-- deactive Locality
    public function deactive($id) 
    {
        $data = array(
            'status' => 0
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id,'tbl_locality');
        $this->session->set_flashdata('msg', 'User deactive Successfully');
        redirect(base_url('admin/locality/all_locality_list'));
    }

    //-- delete user
    public function delete($id)
    {
        $this->common_model->delete($id,'tbl_locality'); 
        $this->session->set_flashdata('msg', 'Locality deleted Successfully');
        redirect(base_url('admin/locality/all_locality_list'));
    }


    public function power()
    {   
		$data['page_title'] = 'Add User Role';
        $data['powers'] = $this->common_model->get_all_power('user_power');
        $data['main_content'] = $this->load->view('admin/user/user_power', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- add user power
    public function add_power()
    {   
        if (isset($_POST)) {
            $data = array(
                'name' => $_POST['name'],
                'power_id' => $_POST['power_id']
            );
            $data = $this->security->xss_clean($data);
            
            //-- check duplicate power id
            $power = $this->common_model->check_exist_power($_POST['power_id']);
            if (empty($power)) {
                $user_id = $this->common_model->insert($data, 'user_power');
                $this->session->set_flashdata('msg', 'Power added Successfully');
            } else {
                $this->session->set_flashdata('error_msg', 'Power id already exist, try another one');
            }
            redirect(base_url('admin/user/power'));
        }
        
    }

    //--update user power
    public function update_power()
    {   
        if (isset($_POST)) {
            $data = array(
                'name' => $_POST['name']
            );
            $data = $this->security->xss_clean($data);
            
            $this->session->set_flashdata('msg', 'Power updated Successfully');
            $user_id = $this->common_model->edit_option($data, $_POST['id'], 'user_power');
            redirect(base_url('admin/user/power'));
        }
        
    }

    public function delete_power($id)
    {
        $this->common_model->delete($id,'user_power'); 
        $this->session->set_flashdata('msg', 'Power deleted Successfully');
        redirect(base_url('admin/user/power'));
    }


}