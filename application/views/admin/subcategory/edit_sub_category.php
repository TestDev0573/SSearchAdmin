
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">

            
           <div class="panel panel-info">
                <div class="panel-heading"> 
                     <i class="fa fa-pencil"></i> &nbsp;Sub Category Edit <a href="<?php echo base_url('admin/sub_category/all_sub_category_list') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-list"></i> All Sub Categories </a>

                </div>
                <div class="panel-body table-responsive">
				
	<?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">�</span> </button>
                </div>
            <?php endif ?>
			
			
                    <form method="post" action="<?php echo base_url('admin/subcategory/update/'.$subcategory->id) ?>" class="form-horizontal" novalidate>
                        <div class="form-group">
                 	<label class="col-md-12" for="example-text">Category</label>
                    <div class="col-sm-12">
                        <select class="form-control custom-select" name="cat_id" aria-invalid="false">
			
			<?php foreach ($category as $ct): ?>
                                                        <?php 
                                                            if($ct['id'] == $subcategory->cat_id){
                                                                $selec = 'selected';
                                                            }else{
                                                                $selec = '';
                                                            }
                                                        ?>
                            
                           
                                <option <?php echo $selec; ?> value="<?php echo $ct['id']; ?>"><?php echo $ct['category_name']; ?></option>
                             <?php endforeach ?>
                        </select>
                    </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-12" for="example-text">Sub Category Name</label>
                        <div class="col-sm-12">
                            <input type="text" name="s_cat_name" value="<?php echo $subcategory->s_cat_name; ?>" class="form-control" required data-validation-required-message="Sub Category Name is required">
                        </div>
                    </div>     
		       
		       
                              

                           <div class="form-group">
                 	<label class="col-md-12" for="example-text">Status</label>
                    <div class="col-sm-12">
                     Active<input <?php if($subcategory->status == 1){echo "checked";}; ?> type="radio"  name="status" id="yesCheck" value="1">&nbsp;&nbsp;
		     Inactive<input <?php if($subcategory->status == 0){echo "checked";}; ?> type="radio"  name="status" id="noCheck" value="0">
                                        </div>
                                    </div>
                              

                     
									
			
	<hr>
                          
                            <!-- CSRF token -->
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
  <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info btn-rounded btn-sm"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Save</button>
                            </div>
                        </div>
                           
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- End Page Content -->