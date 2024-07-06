<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dealer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_login_user();
        $this->load->model('common_model');
        $this->load->model('login_model');
        $this->load->model('category_model');
    }

    public function index()
    {
        $data = array();
        $data['page_title'] = 'Association';
        //$data['category'] = $this->common_model->select('category');
        //$data['city'] = $this->common_model->select('cities');
        //$data['power'] = $this->common_model->get_all_power('user_power');
        $data['main_content'] = $this->load->view('admin/dealer/add', $data, true);
        $this->load->view('admin/index', $data);
    }
    public function get_sub_category()
    {
        $category_id = $this->input->post('id', true);
        $data = $this->common_model->get_sub_category($category_id)->result();
        echo json_encode($data);
    }
    public function get_locality()
    {
        $city_id = $this->input->post('id', true);
        $data = $this->common_model->get_locality($city_id)->result();
        echo json_encode($data);
    }
    //-- add new sub by admin
    public function add_edit($id = 0)
    {
        $data = array();
        $operation = $id ? 'EDIT' : 'ADD';
        $data['page_title'] = $operation . ' ' . 'Association';
        $data['category'] = $this->common_model->select('category');
        $data['sub_cateory'] = $this->common_model->select('tbl_sub_category');
        $data['city'] = $this->common_model->select('cities');
        $data['locality'] = $this->common_model->select('tbl_locality');
        $data['dealer'] = $this->category_model->get_dealer_info($id);
        if ($_POST) {
            $data = array(
            'association_name' => $_POST['association_name'],
            'dealer_name' => $_POST['dealer_name'],
            'city_id' => $_POST['city_id'],
            'locality_id' => $_POST['locality_id'],
            'cat_id' => $_POST['cat_id'],
            'sub_category_id' => $_POST['sub_category'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'closed_day' => $_POST['closed'],
            'working_hours' => $_POST['work_from'] . '-' . $_POST['work_to'],
            'payment_mode' => implode(',', $_POST['paymentMode']),
            'status' => $_POST['status'],
            'created_at' => current_datetime(),
            );
            $data = $this->security->xss_clean($data);
            if ($id > 0) {
                $this->common_model->edit_option($data, $id, 'dealer_association');
                $this->session->set_flashdata('msg', 'dealer_association Updated Successfully');
            } else {
                $asso_name = $this->category_model->check_dealer($_POST['association_name'], $_POST['cat_id']);
                if (empty($asso_name)) {
                    $insert_id = $this->common_model->insert($data, 'dealer_association');
                    $this->session->set_flashdata('msg', 'Association Name added Successfully');
                } else {
                    $this->session->set_flashdata('error_msg', 'Association already exist, try another name');
                    redirect(base_url('admin/dealer/add_edit' . $id));
                }
            }
            $data_image['assocation_id'] = $insert_id ? $insert_id : $id;
            //smnsldmnflsdknfklsd
            if(!empty($_FILES['files']['name'][0])){ 
                $count = count($_FILES['files']['name']);
                for($i=0;$i<$count;$i++)
                {
                    $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                    $_FILES['file']['tmp_name'] =$_FILES['files']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['files']['size'][$i];
                                //-- set upload path
                    $config['upload_path']  = "uploads/images/";
                    $config['allowed_types']= 'gif|jpg|png|jpeg';
                    $config['max_size']     = '92000';
                    $config['max_width']    = '92000';
                    $config['max_height']   = '92000';
        
                    $this->load->library('upload', $config);
        
                    if($this->upload->do_upload("file")) {
        
                        
                        $data = $this->upload->data();
        
                        //-- set upload path
                        $source             = "uploads/images/".$data['file_name'] ;
                        $destination_thumb  = "uploads/images/thumbnail/" ;
                        $destination_medium = "uploads/images/medium/" ;
                        $main_img = $data['file_name'];
                        $data_image['images'] = $main_img;
                        $this->common_model->insert($data_image, 'tbl_dealerAssocation_files');
                        // Permission Configuration
                        chmod($source, 0777) ;
        
                        /* Resizing Processing */
                        // Configuration Of Image Manipulation :: Static
                        $this->load->library('image_lib') ;
                        $img['image_library'] = 'GD2';
                        $img['create_thumb']  = TRUE;
                        $img['maintain_ratio']= TRUE;
        
                        /// Limit Width Resize
                        $limit_medium   = 470 ;
                        $limit_thumb    = 270 ;
        
                        // Size Image Limit was using (LIMIT TOP)
                        $limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
        
                        // Percentase Resize
                        if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
                            $percent_medium = $limit_medium/$limit_use ;
                            $percent_thumb  = $limit_thumb/$limit_use ;
                        }
        
                        //// Making THUMBNAIL ///////
                        $img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
                        $img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
        
                        // Configuration Of Image Manipulation :: Dynamic
                        $img['thumb_marker'] = '_thumb' ;
                        $img['quality']      = ' 100%' ;
                        $img['source_image'] = $source ;
                        $img['new_image']    = $destination_thumb ;
        
                        $thumb_nail = $data['raw_name']. $img['thumb_marker'].$data['file_ext'];
                        // Do Resizing
                        $this->image_lib->initialize($img);
                        $this->image_lib->resize();
                        $this->image_lib->clear() ;
        
                        ////// Making MEDIUM /////////////
                        $img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
                        $img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
        
                        // Configuration Of Image Manipulation :: Dynamic
                        $img['thumb_marker'] = '_medium';
                        $img['quality']      = '100%' ;
                        $img['source_image'] = $source ;
                        $img['new_image']    = $destination_medium ;
        
                        $mid = $data['raw_name']. $img['thumb_marker'].$data['file_ext'];
                        // Do Resizing
                        $this->image_lib->initialize($img);
                        $this->image_lib->resize();
                        $this->image_lib->clear() ;
        
                        // //-- set upload path
                        // $images = 'uploads/images/medium/'.$mid;
                        // $thumb  = 'uploads/images/thumbnail/'.$thumb_nail;
                        // //unlink($source) ;
        
                        // return array(
                        //     'images' => $images,
                        //     'thumb' => $thumb
                        // );
                    }
                }
                
            }
            //dsdmsdfksdf
                    redirect(base_url('admin/dealer/all_dealer_list'));
        }
            $data['id'] = $id;
            $data['main_content'] = $this->load->view('admin/dealer/add', $data, true);
            $this->load->view('admin/index', $data);
    }

    public function all_dealer_list()
    {
        $data['page_title'] = 'Association';
        $data['dealers'] = $this->category_model->get_all_dealer();
        //$data['country'] = $this->common_model->select('country');
        //$data['count'] = $this->common_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/dealer/dealers', $data, true);
        $this->load->view('admin/index', $data);
    }
    //-- active user
    public function active($id)
    {
        $data = array(
            'status' => 1,
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id, 'dealer_association');
        $this->session->set_flashdata('msg', 'Association activated Successfully');
        redirect(base_url('admin/dealer/all_dealer_list'));
    }

    //-- deactive user
    public function deactive($id)
    {
        $data = array(
            'status' => 0,
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id, 'dealer_association');
        $this->session->set_flashdata('msg', 'Association deactivated Successfully');
        redirect(base_url('admin/dealer/all_dealer_list'));
    }

    //-- delete user
    public function delete($id)
    {
        $this->common_model->delete($id, 'Dealer_association');
        $this->session->set_flashdata('msg', 'Association deleted Successfully');
        redirect(base_url('admin/dealer/all_dealer_list'));
    }

}
