
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">


           <div class="panel panel-info">
                <div class="panel-heading"> <i class="fa fa-list"></i> All reviews
				</div>

                <div class="panel-body table-responsive">

				 <?php $msg = $this->session->flashdata('msg');?>
            <?php if (isset($msg)): ?>
                <div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i> <?php echo $msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif?>

            <?php $error_msg = $this->session->flashdata('error_msg');?>
            <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif?>
							<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                    <tr>
                                    <th>Name</th>
                                    <th>Review</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                    <tr>
                                    <th>Name</th>
                                    <th>Review</th>
                                    <th>Rating/th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>

                            <tbody>
                            <?php foreach ($reviews as $reviews): ?>

                                <tr>

                                    <td><?php echo $reviews['name'] ?></td>
                                    <td><?php echo $reviews['review']; ?></td>
                                    <td><?php echo $reviews['rating']; ?></td>


                                    <td>
                                        <?php if ($reviews['status'] == 0): ?>
                                            <div class="label label-table label-danger">Inactive</div>
                                        <?php else: ?>
                                            <div class="label label-table label-success">Active</div>
                                        <?php endif?>
                                    </td>
                                    <!-- <td width="10%">
                                        <?php if ($review['role'] == 'admin'): ?>
                                            <div class="label label-table label-info"><i class="fa fa-review"></i> admin</div>
                                        <?php else: ?>
                                            <div class="label label-table label-success">review</div>
                                        <?php endif?>
                                    </td> -->

                                    <td><?php echo my_date_show_time($reviews['created_date']); ?></td>
                                    <td class="text-nowrap">

                                        <?php if ($this->session->userdata('role') == 'admin'): ?>

										<a href="<?php echo base_url('admin/review/update/' . $reviews['id']) ?>"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></button></a>

											<a href="<?php echo base_url('admin/review/delete/' . $reviews['id']) ?>" onClick="return doconfirm();" data-toggle="tooltip" data-original-title="Delete"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>


                                        <?php else: ?>

                                            <!-- check logged review role permissions -->

                                            <?php if (check_power(2)): ?>

<a href="<?php echo base_url('admin/review/update/' . $reviews['id']) ?>"><button type="button" class="btn btn-success btn-circle btn-xs"><i class="fa fa-edit"></i></button></a>

                                            <?php endif;?>

                                            <?php if (check_power(3)): ?>


<a href="<?php echo base_url('admin/review/delete/' . $reviews['id']) ?>" onClick="return doconfirm();" data-toggle="tooltip" data-original-title="Delete"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>

                                            <?php endif;?>

                                        <?php endif?>



                                        <?php if ($reviews['status'] == 1): ?>

<a href="<?php echo base_url('admin/review/deactive/' . $reviews['id']) ?>" data-toggle="tooltip" data-original-title="Deactive"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>


                                        <?php else: ?>

<a href="<?php echo base_url('admin/review/active/' . $reviews['id']) ?>" data-toggle="tooltip" data-original-title="Activate"><button type="button" class="btn btn-success btn-circle btn-xs"><i class="fa fa-check"></i></button></a>
                                        <?php endif?>

                                    </td>
                                </tr>

                            <?php endforeach?>

                            </tbody>


                        </table>
                    </div>


            </div>
        </div>
    </div>

 </div>

    <!-- End Page Content -->