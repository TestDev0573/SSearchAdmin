
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">

            
           <div class="panel panel-info">
                <div class="panel-heading"> 
                     <i class="fa fa-pencil"></i> &nbsp;Dealer Edit <a href="<?php echo base_url('admin/dealer/all_dealer_list') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-list"></i> All Dealer</a>

                </div>
                <div class="panel-body table-responsive">
				
	<?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">�</span> </button>
                </div>
            <?php endif ?>
			
			
                    <form method="post" action="<?php echo base_url('admin/dealer/update/'.$dealer->id) ?>" class="form-horizontal" novalidate>
                        <div class="form-group">
                        <label class="col-md-12" for="example-text">Association Name</label>
                        <div class="col-sm-12">
                            <input type="text" name="association_name" value="<?php echo $dealer->association_name; ?>" class="form-control" required data-validation-required-message="Association Name is required">
                        </div>
                    </div>
		     <div class="form-group">
                        <label class="col-md-12" for="example-text">Dealer Name</label>
                        <div class="col-sm-12">
                            <input type="text" name="dealer_name" value="<?php echo $dealer->dealer_name; ?>" class="form-control" required data-validation-required-message="Dealer Name is required">
                        </div>
                    </div>
		       
		       <div class="form-group">
                        <label class="col-md-12" for="example-text">City Name</label>
		    <div class="col-sm-12">
                        <select class="form-control custom-select" name="city_id" aria-invalid="false"> 
			<?php foreach ($city as $ct): ?>
                                                        <?php 
                                                            if($ct['id'] == $dealer->city_id){
                                                                $selected = 'selected';
                                                            }else{
                                                                $selected = '';
                                                            }
                                                        ?>	
                            <option <?php echo $selected; ?> value="<?php echo $ct['id']; ?>"><?php echo $ct['city_name']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div></div>


		     <div class="form-group">
                 	<label class="col-md-12" for="example-text">Category</label>
                    <div class="col-sm-12">
                        <select class="form-control custom-select" name="cat_id" aria-invalid="false">
			
			<?php foreach ($category as $ct): ?>
                                                        <?php 
                                                            if($ct['id'] == $dealer->cat_id){
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
                        <label class="col-md-12" for="example-text">Email Address</label>
                        <div class="col-sm-12">
                            <input type="text" name="email" value="<?php echo $dealer->email; ?>" class="form-control" required data-validation-required-message="Email address is required">
                        </div>
                    </div>
		     <div class="form-group">
                        <label class="col-md-12" for="example-text">Phone</label>
                        <div class="col-sm-12">
                            <input type="text" name="phone" value="<?php echo $dealer->phone; ?>" class="form-control" required data-validation-required-message="Phone is required">
                        </div>
                    </div>
		    <div class="form-group">
                        <label class="col-md-12" for="example-text">Location</label>
                        <div class="col-sm-12">
                            <input type="text" name="address" value="<?php echo $dealer->address; ?>" class="form-control" required data-validation-required-message="Address is required">
                        </div>
                    </div> 
		       
		       
                              

                           <div class="form-group">
                 	<label class="col-md-12" for="example-text">Status</label>
                    <div class="col-sm-12">
                     Active<input <?php if($dealer->status == 1){echo "checked";}; ?> type="radio"  name="status" id="yesCheck" value="1">&nbsp;&nbsp;
		     Inactive<input <?php if($dealer->status == 0){echo "checked";}; ?> type="radio"  name="status" id="noCheck" value="0">
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