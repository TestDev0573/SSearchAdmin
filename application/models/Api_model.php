<?php
class Api_model extends CI_Model {
    //-- image upload function with resize option
    function upload_image($images){
            $_FILES['file']['name'] = $images['image']['name'];
            $_FILES['file']['type'] = $images['image']['type'];
            $_FILES['file']['tmp_name'] =$images['image']['tmp_name'];
            $_FILES['file']['error'] = $images['image']['error'];
            $_FILES['file']['size'] = $images['image']['size'];
                        //-- set upload path
            $config['upload_path']  = "uploads/images/reviewImages/";
            $config['allowed_types']= 'gif|jpg|png|jpeg';
            $config['max_size']     = '92000';
            $config['max_width']    = '92000';
            $config['max_height']   = '92000';

            $this->load->library('upload', $config);
            if($this->upload->do_upload("file")) {
                $data = $this->upload->data();

                //-- set upload path
                $source             = "uploads/images/reviewImages/".$data['file_name'] ;
                $destination_thumb  = "uploads/images/reviewImages/thumbnail/" ;
                $destination_medium = "uploads/images/reviewImages/medium/" ;
                $main_img = $data['file_name'];
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
                $limit_thumb    = 80 ;

                // Size Image Limit was using (LIMIT TOP)
                $limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

                // Percentase Resize
                if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
                    $percent_medium = $limit_medium/$limit_use ;
                    $percent_thumb  = $limit_thumb/$limit_use ;
                }

                //// Making THUMBNAIL ///////
                //$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
               // $img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
		$img['width']  = 80 ;
                $img['height'] = 80 ;

                // Configuration Of Image Manipulation :: Dynamic
                $img['thumb_marker'] ='';
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
		unlink($source);
            }
          
    }
}

