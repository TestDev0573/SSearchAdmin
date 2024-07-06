<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
     
class City extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($keyword = null)
	{
   
        if(!empty($keyword)){
            $data = $this->db->select('city_name')->from('cities')->where("city_name LIKE '$keyword%'")->get()->result_array();
        }else{
            $data = $this->db->get("cities")->result();
        }
       
        echo $this->response($data, REST_Controller::HTTP_OK);
        
	}

	public function getKeyword($keyword = null)
	{
   
        if(!empty($keyword)){
            
            $data = $this->db->select('*')->from('category')->where("category_name LIKE '$keyword%'")->get()->result_array();
        }else{
            $data = $this->db->get("category")->result();
        }
       
        echo $this->response($data, REST_Controller::HTTP_OK);
        
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('cities',$input);
     
        $this->response(['city created successfully.'], REST_Controller::HTTP_OK);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('cities', $input, array('id'=>$id));
     
        $this->response(['city updated successfully.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $this->db->delete('cities', array('id'=>$id));
       
        $this->response(['city deleted successfully.'], REST_Controller::HTTP_OK);
    }
    	
}
