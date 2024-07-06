<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
     
class BuySaleApi extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->model('api_model');
       $this->load->model('common_model');
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($keyword = null)
	{
         $keyword = str_replace("%20", " ", $keyword);
        if(!empty($keyword)){
            $data = $this->db->select('city_name','id')->from('cities')->where("city_name LIKE '$keyword%'")->get()->result_array();
        }else{
            $data = $this->db->get("cities")->result();
        }
       
        echo $this->response($data, REST_Controller::HTTP_OK);
        
	}

	public function getKeyword_get($keyword = null)
	{
        $where='';
	$where .= "status=1";
        if(!empty($keyword)){
            $where .=" AND category_name LIKE '$keyword%'";
	}
            $data = $this->db->select('category_name')->from('category')->where($where)->get()
            ->result_array();
        echo $this->response($data, REST_Controller::HTTP_OK);
        
	}
	public function getListImage_get($id = 0)
	{
        $where='';
	//$where .= "status=1";
        if(!empty($id)){
            $where .=" assocation_id=$id";
	}
            $data = $this->db->select('images')->from('tbl_dealerAssocation_files')->where($where)->limit(1)->get()
            ->result_array();
	//print_r($this->db->last_query());
	//die;
        echo $this->response($data, REST_Controller::HTTP_OK);
        
	}
	public function locality_get($city = null,$keyword=null)
	{
        $where='';
	$where .= "status=1";
        if(!empty($keyword)){
	    $city = str_replace("%20", " ", $city);
	    $city_id=$this->db->select('*')->from('cities')->where("city_name='$city'")->get()->result_array();
            $city_id=$city_id[0]['id'];
            $where .=" AND city_id=$city_id";
	    $where .=" AND locality_name LIKE '$keyword%'";
	} 
             
            $data = $this->db->select('locality_name')->from('tbl_locality')->where($where)->get()
            ->result_array();
           echo $this->response($data, REST_Controller::HTTP_OK);
        
	}
       public function getRegionCode_get($city = null,$locality=null)
	{
        $where='';
	$where .= "status=1";
        if(!empty($city) && !empty($locality)){
            $city = str_replace("%20", " ", $city);
	    $locality = str_replace("%20", " ", $locality);
	    $city_id=$this->db->select('*')->from('cities')->where("city_name='$city'")->get()->result_array();
            $where .=" AND TRIM(locality_name) ='$locality'";
	    $city_id=$city_id[0]['id'];
	    $where .=" AND city_id=$city_id";
	}
            $data = $this->db->select('locality_region_code')->from('tbl_locality')->where($where)->get()
            ->result_array();
		//print_r($this->db->last_query());  
           echo $this->response($data, REST_Controller::HTTP_OK);
        
	}
	// List Function
    public function getList_get($keyword=null,$regionCode=null)
	{
         $where='';
	 $where .= "as.status=1";
         if(!empty($keyword)){
                $keyword=str_replace("%20", " ", $keyword);
                $whereToGetCatId = "status=1 AND category_name LIKE '$keyword%'";
		$cat_id=$this->db->select('*')->from('category')->where($whereToGetCatId)->get()
            	->result_array();
                $cat_id=$cat_id[0]['id'];
		$where .= " AND cat_id=$cat_id";
               	
	 }
         if(!empty($regionCode)){
                $whereToGetCityAndlocality = "status=1 AND locality_region_code = '$regionCode'";
		$cityAndLocality=$this->db->select('*')->from('tbl_locality')->where($whereToGetCityAndlocality)->get()
            	->result_array();
                $city_id=$cityAndLocality[0]['city_id'];
		$locality_id=$cityAndLocality[0]['id'];
		$where .= " AND city_id=$city_id AND locality_id=$locality_id";
          }
            
		$this->db->select('as.*,assfile.images,avg(re.rating) rating,count(re.review) review');
		$this->db->from('dealer_association as');
		$this->db->join('tbl_dealerAssocation_files assfile', 'as.id = assfile.	assocation_id','left');
		$this->db->join('tbl_review re', 'as.id = re.dealer_id','left');
		$this->db->where($where);
		$this->db->group_by("as.id");
                $data = $this->db->get()->result_array();
		//print_r($this->db->last_query());  
           echo $this->response($data, REST_Controller::HTTP_OK);
        
	}
		// Get Details 
	 public function getDealerDetails_get($DealerId=0)
	{
        $where='';
	$where .= "status=1";
        if(!empty($DealerId)){
            $DealerId = trim($DealerId);
	    $where .=" AND dA.id=$DealerId";
            $this->db->select('dA.*,group_concat(assfile.images) Images');
	    $this->db->from('dealer_association dA');
	    $this->db->join('tbl_dealerAssocation_files assfile', 'dA.id = assfile.assocation_id','left');
	    $this->db->where($where);
	   $data = $this->db->get()->result_array();
		//print_r($this->db->last_query());  
           echo $this->response($data, REST_Controller::HTTP_OK);
	 }
 
        
	}
 	public function getReviewRating_get($DealerId=0)
	{
        $where='';
	$where .= "status=1";
        if(!empty($DealerId)){
            $DealerId = trim($DealerId);
	    $where .=" AND dealer_id=$DealerId";
	   $data = $this->db->select('*')->from('tbl_review')->where($where)->get()
            ->result_array();
		//print_r($this->db->last_query());  
           echo $this->response($data, REST_Controller::HTTP_OK);
	 }
	}
	public function getBannerImages_get($DealerId=0)
	{
        $where='1=1';
	//$where .= "status=1";
        if(!empty($DealerId)){
            $DealerId = trim($DealerId);
	    $where .=" AND assocation_id=$DealerId";
	  
	   $data = $this->db->select('images')->from('tbl_dealerAssocation_files')->where($where)->get()
            ->result_array();
		//print_r($this->db->last_query());  
           echo $this->response($data, REST_Controller::HTTP_OK);
	 }
        
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
     public function  postReview_post(){
                $result=[];
		if(isset($_FILES['image']['name'])){
                 $file=$_FILES['image']['name'];
                 }else{ $file='';}
                $data = array(	    
                'name' => $_POST['name'],
                'dealer_id' => $_POST['dealer_id'],
                'image'=>$file,
                'review' => $_POST['message'],
                'rating' =>$_POST['rating'], 
                'status'=>0,            
                'created_date' => current_datetime()
                    );
		$insert_id = $this->common_model->insert($data, 'tbl_review');
		if($insert_id){
                        if(isset($_FILES['image']['name'])){
				$this->api_model->upload_image($_FILES);
			}
			
                      
                    $result['status']="success";
                    $result['result']="Your review is sent for approval.";  
		}
                else{
		    $result['status']="error";
                    $result['result']="Some thing error occured While submitting review"; 	
		}
             echo json_encode($result);
	}
	public function  postBestDesilsDetails_post(){
                $result=[];
                $postData = json_decode(file_get_contents('php://input'), true);
                //print_r($postData['name']);
                $data = array(	    
                'name' =>$postData['name'],
                'mobile' => $postData['mobile'],
                'email'=>$postData['email'],
                'message' =>$postData['message'], 
                'status'=>1,            
                'created_date' => current_datetime()
                    );
                 //print_r($data);
		$insert_id = $this->common_model->insert($data, 'tbl_getBestDeails');
		if($insert_id){
                       // echo "aaa";
                     	/*$this->load->config('email');
			$this->load->library('email');
			$from = $this->config->item('smtp_user');
			$to = $postData['email'];
			$subject = "Think 4 By and Sale";
			$message = $postData['message'];
			$this->email->set_newline("\r\n");
			$this->email->from($from);
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($message);*/
                    $result['status']="success";
                    $result['result']="Your Query Added succesfully.Our represntative conatct you soon.Thank you.";  

		}
                else{
		    $result['status']="error";
                    $result['result']="Some thing error occured While submitting review"; 	
		}
             echo json_encode($result);
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
