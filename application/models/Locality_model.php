<?php
class Locality_model extends CI_Model {

   function check_locality($locality, $city_id,$id=0){
        $this->db->select('l.locality_name');
        $this->db->from('tbl_locality l');
        $this->db->where('l.city_id', $city_id);
        $this->db->where('l.locality_name', $locality);
        $this->db->where('l.id !=', $id);
	    $this->db->limit(1);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
     function get_all_locality(){
        $this->db->select('l.*');
        $this->db->select('ct.city_name, l.status as status');
        $this->db->from('tbl_locality l');
        $this->db->join('cities ct','l.city_id = ct.id','LEFT');
        $this->db->order_by('l.id','DESC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
     function get_dealer_info($id){
        $this->db->select('d.*');   
	//$this->db->select('c.category_name as category_name, s.status as status');	
        $this->db->from('dealer_association d');  
	 //$this->db->join('category c','c.id = s.cat_id','LEFT');	
        $this->db->where('d.id',$id);
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }
   function check_sub_category($type, $cat_id){
        $this->db->select('c.*');
        $this->db->from('s_category c');
        $this->db->where('c.cat_id', $cat_id);
        $this->db->where('c.s_cat_name', $type);
	 $this->db->limit(1);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
   
   function check_category($category_name){
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('category_name', $category_name); 
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1) {                 
            return $query->result();
        }else{
            return false;
        }
    }
 
 
 //-- get all categories with 
    function get_all_category(){
        $this->db->select('c.*');        
        $this->db->from('category c');       
        $this->db->order_by('c.id','DESC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
    
    //-- get all categories with 
  
     function get_all_sub_category(){
        $this->db->select('s.*');
        $this->db->select('c.category_name as category_name, s.status as status');
        $this->db->from('s_category s');
        $this->db->join('category c','c.id = s.cat_id','LEFT');
        $this->db->order_by('s.id','DESC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
     function get_sub_category_info($id){
        $this->db->select('s.*');   
	$this->db->select('c.category_name as category_name, s.status as status');	
        $this->db->from('s_category s');  
	 $this->db->join('category c','c.id = s.cat_id','LEFT');	
        $this->db->where('s.id',$id);
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }
    
 //-- get single cat info
    function get_locality_info($id){
        $this->db->select('l.*');       
        $this->db->from('tbl_locality l');        
        $this->db->where('l.id',$id);
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }
    

    //-- get logged user info
    function get_user_info(){
        $this->db->select('u.*');
        $this->db->select('c.name as country_name');
        $this->db->from('user u');
        $this->db->join('country c','c.id = u.country','LEFT');
        $this->db->where('u.id',$this->session->userdata('id'));
        $this->db->order_by('u.id','DESC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }

   

    //-- get single user info
    function get_user_role($id){
        $this->db->select('ur.*');
        $this->db->from('user_role ur');
        $this->db->where('ur.user_id',$id);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }


   

    //-- count active, inactive and total user
    function get_user_total(){
        $this->db->select('*');
        $this->db->select('count(*) as total');
        $this->db->select('(SELECT count(user.id)
                            FROM user 
                            WHERE (user.status = 1)
                            )
                            AS active_user',TRUE);

        $this->db->select('(SELECT count(user.id)
                            FROM user 
                            WHERE (user.status = 0)
                            )
                            AS inactive_user',TRUE);

        $this->db->select('(SELECT count(user.id)
                            FROM user 
                            WHERE (user.role = "admin")
                            )
                            AS admin',TRUE);

        $this->db->from('user');
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }


   

}