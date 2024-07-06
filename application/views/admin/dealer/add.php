
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">


           <div class="panel panel-info">
                <div class="panel-heading">
                     <i class="fa fa-plus"></i> <?php echo $page_title;?>&nbsp;<a href="<?php echo base_url('admin/dealer/all_dealer_list') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-list"></i> List Dealer </a>

                </div>
                <div class="panel-body table-responsive">

				 <?php $error_msg = $this->session->flashdata('error_msg');?>
            <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;value="<?php echo @$dealer->dealer_name; ?>"
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif?>
                    <form method="post" action="<?php echo base_url('admin/dealer/add_edit/'.@$id) ?>" class="form-horizontal" enctype='multipart/form-data' novalidate>

                          <div class="form-group">
                 	<!--<label class="col-md-12" for="example-text">Association</label>-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Association Name <span class="text-danger">*</span></label>
                                <div class="col-md-9 controls">
                                    <input type="text" name="association_name" value="<?php echo @$dealer->association_name; ?>" class="form-control" required data-validation-required-message="Association Name is required">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Dealer Name <span class="text-danger">*</span></label>
                                <div class="col-md-9 controls">
                                    <input type="text" name="dealer_name" class="form-control" value="<?php echo @$dealer->dealer_name; ?>" required data-validation-required-message="Dealer Name is required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">City Name <span class="text-danger">*</span></label>
                                <div class="col-md-9 controls">
                                <select class="form-control custom-select" name="city_id" id="city_id" aria-invalid="false">
                                    <option value="0">Select City</option>
                                    <?php foreach ($city as $ct): ?>
                                        <?php 
                                            if($ct['id'] == @$dealer->city_id){
                                                $selected = 'selected';
                                            }else{
                                                $selected = '';
                                            }
                                        ?>	
                            <option <?php echo @$selected; ?> value="<?php echo $ct['id']; ?>"><?php echo $ct['city_name']; ?></option>
                            <?php endforeach ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Locality<span class="text-danger">*</span></label>
                                <div class="col-md-9 controls">
                                <select class="form-control custom-select" name="locality_id" id="locality_id" aria-invalid="false">
                                    <option value="0">Select locality</option>
                                    <?php foreach ($locality as $loc): ?>
                                        <?php 
                                            if($loc['id'] == @$dealer->locality_id){
                                                $selected = 'selected';
                                            }else{
                                                $selected = '';
                                            }
                                        ?>	
                                    <option <?php echo @$selected; ?> value="<?php echo $loc['id']; ?>"><?php echo $loc['locality_name']; ?></option>
                                    <?php endforeach ?>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Category Name <span class="text-danger">*</span></label>
                                <div class="col-md-9 controls">
                                <select class="form-control custom-select" name="cat_id"  id="category"aria-invalid="false">
                                <option>Selecte Category</option>
                                <?php foreach ($category as $cat): ?>
                                    <?php 
                                        if($cat['id'] == @$dealer->cat_id){
                                            $selec = 'selected';
                                        }else{
                                            $selec = '';
                                        }
                                    ?>
                                <option <?php echo @$selec; ?> value="<?php echo $cat['id']; ?>"><?php echo $cat['category_name']; ?></option>
                             <?php endforeach ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Sub Category <span class="text-danger">*</span></label>
                                <div class="col-md-9 controls">
                                <select class="form-control custom-select" id="sub_category" name="sub_category" aria-invalid="false">
                                    <option>No Selected</option>
                                    <?php foreach ($sub_cateory as $sub_cat): ?>
                                    <?php 
                                        if($sub_cat['id'] == @$dealer->sub_category_id){
                                            $selec = 'selected';
                                        }else{
                                            $selec = '';
                                        }
                                    ?>
                                <option <?php echo @$selec; ?> value="<?php echo $sub_cat['id']; ?>"><?php echo $sub_cat['s_cat_name']; ?></option>
                             <?php endforeach ?>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Email<span class="text-danger">*</span></label>
                                <div class="col-md-9 controls">
                                    <input type="text" name="email" value="<?php echo @$dealer->email; ?>" class="form-control" rrequired data-validation-required-message="Email address is required">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Phone<span class="text-danger">*</span></label>
                                <div class="col-md-9 controls">
                                    <input type="text" name="phone" value="<?php echo @$dealer->phone; ?>" class="form-control" required data-validation-required-message="Phone Number Name is required">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Address<span class="text-danger">*</span></label>
                                <div class="col-md-9 controls">
                                    <input type="text" name="address" class="form-control" value="<?php echo @$dealer->address; ?>" rrequired data-validation-required-message="Address is required">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Closed on</label>
                                <div class="col-md-9 controls">
                                <select class="form-control custom-select" name="closed" id="closed" aria-invalid="false">
                                    <option value="0">Select Day</option>
                                    <?php foreach (FULLWEEK as $fullweek): ?>
                                        <?php
                                          $selected = $fullweek==@$dealer->closed_day ? 'selected' : '';
                                        ?>
                                        <option <?php echo $selected ?> value="<?php echo $fullweek; ?>"><?php echo $fullweek; ?></option>
                                    <?php endforeach?>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Working Hours From<span class="text-danger">*</span></label>
                                <div class="col-md-9 controls">
                                <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                                        <input type="text" class="form-control" name="work_from" value="<?php echo @explode("-", @$dealer->working_hours)[0];?>">
                                        <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Working Hours To<span class="text-danger">*</span></label>
                                <div class="col-md-9 controls">
                                <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                                        <input type="text" class="form-control" name="work_to"  value="<?php echo @explode("-", @$dealer->working_hours)[1];?>">
                                        <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right ">Payment Mode :&nbsp;</label>
                                <div class="radio-list">
                                    <label class="radio-inline p-0">
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="paymentMode[]" id="radio1" value="Debit Card">
                                            <label for="radio1">Debit Card</label>
                                        </div>
                                    </label>
                                    <label class="radio-inline p-0">
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="paymentMode[]" id="radio1" value="Credit Card">
                                            <label for="radio1">Credit Card</label>
                                        </div>
                                    </label>
                                    <label class="radio-inline p-0">
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="paymentMode[]" id="radio1" value="Cheque">
                                            <label for="radio1">Cheque</label>
                                        </div>
                                    </label>
                                    <label class="radio-inline p-0">
                                        <div class="form-check form-check-inline">
                                        <input type="checkbox" name="paymentMode[]" id="radio1" value="Cash">
                                            <label for="radio2">Cash </label>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Association Images </h3>
                            <p class="text-muted m-b-30"> For multiple file upload</p>
                            <div class="dropzone">
                                <div class="fallback">
                                    <input name="files[]" type="file" multiple />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                     <div class="form-group">
                        <label class="col-md-12" for="example-text">Status</label>
                        <div class="col-sm-12">
                            Active&nbsp;<input <?php if(@$dealer->status == 1){echo "checked";}; ?> type="radio" onclick="javascript:yesnoCheck();" name="status" id="yesCheck" value="1">&nbsp;&nbsp;&nbsp; Inactive&nbsp;<input type="radio"<?php if(@$dealer->status == 0){echo "checked";}; ?>  onclick="javascript:yesnoCheck();" name="status" id="noCheck" value="0">
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

    <script type="text/javascript">
        $(document).ready(function(){
            
            $('#category').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('admin/dealer/get_sub_category');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id+'>'+data[i].s_cat_name+'</option>';
                        }
                        $('#sub_category').html(html);
 
                    }
                });
                return false;
            }); 
            $('#city_id').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('admin/dealer/get_locality');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id+'>'+data[i].locality_name+'</option>';
                        }
                        $('#locality_id').html(html);
 
                    }
                });
                return false;
            }); 
        });
    </script>