<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('city_model');
       $this->load->model('common_model');
       $this->load->model('login_model');
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'City';
        $data['state'] = $this->common_model->select('state');
        //$data['power'] = $this->common_model->get_all_power('user_power');
        $data['main_content'] = $this->load->view('admin/city/add', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- add new city by admin
    public function add()
    {   
        if ($_POST) {

            $data = array(
                'state_id' => $_POST['state'],
                'city_name' => $_POST['city_name'] ,
                'created_date' => current_datetime()           
            );
            $data_locality['locality_name']=$_POST['locality_name'];
            $data = $this->security->xss_clean($data);
            //-- check duplicate city   
            $city_name = $this->city_model->check_city($_POST['city_name']);
            if (empty($city_name)) {
                $city_id = $this->city_model->insert($data, 'cities');
                

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
                $this->session->set_flashdata('msg', 'City added Successfully');
                redirect(base_url('admin/city/all_city_list'));
            } else {
                $this->session->set_flashdata('error_msg', 'City already exist, try another City');
                redirect(base_url('admin/city'));
            }
            
            
            

        }
    }

    public function all_city_list()
    {
	 	$data['page_title'] = 'All Cities';
        $data['location_lists'] = $this->city_model->get_city_list();
        //$data['country'] = $this->common_model->select('country');
      //  $data['count'] = $this->common_model->get_location_total();
        $data['main_content'] = $this->load->view('admin/city/listCity.php', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- update users info
    public function update($id)
    {
        if ($_POST) {

            $data = array(
                'state_id' => $_POST['state'],
                'city_name' => $_POST['city_name']
            );
            $data = $this->security->xss_clean($data);

            $powers = $this->input->post('role_action');
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
            }
            $city_name = $this->city_model->check_city($_POST['city_name'],$id);
            if($city_name){
                $this->session->set_flashdata('error_msg', 'City Already Exists');
                redirect(base_url('admin/city/all_city_list')); 
            }
            $this->common_model->edit_option($data, $id, 'cities');
                $this->session->set_flashdata('msg', 'City Updated Successfully');
                redirect(base_url('admin/city/all_city_list'));

        }
		
        $data['city'] = $this->city_model->get_single_city_info($id);
        //$data['state'] = $this->common_model->select('state');
        //$data['user_role'] = $this->common_model->get_user_role($id);
        //$data['power'] = $this->common_model->select('user_power');
        //$data['country'] = $this->common_model->select('country');
        $data['main_content'] = $this->load->view('admin/city/edit_city', $data, TRUE);
		$data['page_title'] = 'Edit City';
        $this->load->view('admin/index', $data);
        
    }

    
    //-- active user
    public function active($id) 
    {
        $data = array(
            'status' => 1
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id,'cities');
        $this->session->set_flashdata('msg', 'City active Successfully');
        redirect(base_url('admin/city/all_city_list'));
    }

    //-- deactive user
    public function deactive($id) 
    {
        $data = array(
            'status' => 0
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id,'cities');
        $this->session->set_flashdata('msg', 'User deactive Successfully');
        redirect(base_url('admin/user/all_city_list'));
    }

    //-- delete user
    public function delete($id)
    {
        $this->common_model->delete($id,'cities'); 
        $this->session->set_flashdata('msg', 'City deleted Successfully');
        redirect(base_url('admin/city/all_city_list'));
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