<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Review extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
       $this->load->model('review_model');
    }

    public function index()
    {
        $data['page_title'] = 'All Reviews';
       // $data['users'] = $this->common_model->get_all_review();
        $data['reviews'] = $this->common_model->select('tbl_review');
       // $data['count'] = $this->common_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/reviews/reviews', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- add new review by admin
    public function add()
    {   
        if ($_POST) {

            $data = array(
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'password' => md5($_POST['password']),
                'mobile' => $_POST['mobile'],
                'country' => $_POST['country'],
                'status' => $_POST['status'],
                'role' => $_POST['role'],
                'created_at' => current_datetime()
            );

            $data = $this->security->xss_clean($data);
            
            //-- check duplicate email
            $email = $this->common_model->check_email($_POST['email']);

            if (empty($email)) {
                $user_id = $this->common_model->insert($data, 'review');
            
                if ($this->input->post('role') == "review") {
                    $actions = $this->input->post('role_action');
                    foreach ($actions as $value) {
                        $role_data = array(
                            'user_id' => $user_id,
                            'action' => $value
                        ); 
                       $role_data = $this->security->xss_clean($role_data);
                       $this->common_model->insert($role_data, 'user_role');
                    }
                }
                $this->session->set_flashdata('msg', 'review added Successfully');
                redirect(base_url('admin/review/all_user_list'));
            } else {
                $this->session->set_flashdata('error_msg', 'Email already exist, try another email');
                redirect(base_url('admin/review'));
            }
            
            
            

        }
    }

    public function all_user_list()
    {
	 	$data['page_title'] = 'All Registered Users';
        $data['users'] = $this->common_model->get_all_user();
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/review/users', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- update users info
    public function update($id)
    {
        if ($_POST) {
            
            $data = array(
                'name' => $_POST['name'],
                'rating' => $_POST['rating'],
                'review' => $_POST['review'],
            );
            $data = $this->security->xss_clean($data);
            // $powers = $this->input->post('role_action');
            // if (!empty($powers)) {
            //     $this->common_model->delete_user_role($id, 'user_role');
            //     foreach ($powers as $value) {
            //        $role_data = array(
            //             'user_id' => $id,
            //             'action' => $value
            //         ); 
            //        $role_data = $this->security->xss_clean($role_data);
            //        $this->common_model->insert($role_data, 'user_role');
            //     }
            // }

            $this->common_model->edit_option($data, $id, 'tbl_review');
            $this->session->set_flashdata('msg', 'Information Updated Successfully');
            redirect(base_url('admin/review'));

        }
		
        $data['review'] = $this->review_model->get_single_review_info($id);
        //$data['user_role'] = $this->common_model->get_user_role($id);
        //$data['power'] = $this->common_model->select('user_power');
        //$data['country'] = $this->common_model->select('country');
        $data['main_content'] = $this->load->view('admin/reviews/edit_review', $data, TRUE);
		$data['page_title'] = 'Edit Review';
        $this->load->view('admin/index', $data);
        
    }

    
    //-- active review
    public function active($id) 
    {
        $data = array(
            'status' => 1
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id,'tbl_review');
        $this->session->set_flashdata('msg', 'review active Successfully');
        redirect(base_url('admin/review'));
    }

    //-- deactive review
    public function deactive($id) 
    {
        $data = array(
            'status' => 0
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id,'tbl_review');
        $this->session->set_flashdata('msg', 'Review deactive Successfully');
        redirect(base_url('admin/review'));
    }

    //-- delete review
    public function delete($id)
    {
        $this->common_model->delete($id,'tbl_review'); 
        $this->session->set_flashdata('msg', 'review deleted Successfully');
        redirect(base_url('admin/review'));
    }


    public function power()
    {   
		$data['page_title'] = 'Add review Role';
        $data['powers'] = $this->common_model->get_all_power('user_power');
        $data['main_content'] = $this->load->view('admin/review/user_power', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- add review power
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
            redirect(base_url('admin/review/power'));
        }
        
    }

    //--update review power
    public function update_power()
    {   
        if (isset($_POST)) {
            $data = array(
                'name' => $_POST['name']
            );
            $data = $this->security->xss_clean($data);
            
            $this->session->set_flashdata('msg', 'Power updated Successfully');
            $user_id = $this->common_model->edit_option($data, $_POST['id'], 'user_power');
            redirect(base_url('admin/review/power'));
        }
        
    }

    public function delete_power($id)
    {
        $this->common_model->delete($id,'user_power'); 
        $this->session->set_flashdata('msg', 'Power deleted Successfully');
        redirect(base_url('admin/review/power'));
    }


}