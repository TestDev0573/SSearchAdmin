
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">

            
           <div class="panel panel-info">
                <div class="panel-heading"> 
                     <i class="fa fa-pencil"></i> &nbsp;Review Edit <a href="<?php echo base_url('admin/review') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-list"></i> All Reviews </a>

                </div>
                <div class="panel-body table-responsive">
				
				 <?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">�</span> </button>
                </div>
            <?php endif ?>
			
			
                    <form method="post" action="<?php echo base_url('admin/review/update/'.$review->id) ?>" class="form-horizontal" novalidate>
                      
                           <div class="form-group">
                 	<label class="col-md-12" for="example-text">Name</label>
                    <div class="col-sm-12">
                     <input type="text" name="name" class="form-control" value="<?php echo $review->name; ?>">
                                        </div>
                                    </div>
                              

                           <div class="form-group">
                 	<label class="col-md-12" for="example-text">Rating</label>
                    <div class="col-sm-12">
                   <input type="number" name="rating" class="form-control" value="<?php echo $review->rating; ?>">
                                        </div>
                                    </div>
                              
                    <div class="form-group">
                 	<label class="col-md-12" for="example-text">Review</label>
                    <div class="col-sm-12">
                    <textarea class="form-control" rows="5" id="comment" name="review" ><?php echo $review->review; ?></textarea>
                                        </div>
                                    </div>
                          
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