<?php $this->load->view("Header_Footer/header.php"); ?>

 

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-12">


      <!-- ============== Add Modal Start ====================== -->
      <div class="modal fade" id="add_category">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Category Name Create Form</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            <form action="<?php echo base_url('Categories_controller/add');?>" method="post">

            <?php echo form_error('category_name'); ?>

                <div class="form-group">
                  <label for="exampleFormControlFile1">Add Category</label>
                  <input type="text" name="category_name" class="form-control-file" id="exampleFormControlFile1" placeholder="Enter category name">
                </div>
              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Save">
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- ============== Add Modal End ====================== -->

      
      <!-- ============== Edit Modal Start ====================== -->
      <div class="modal fade" id="edit_category">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update category name</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            <form action="<?php echo base_url('Categories_controller/uplade');?>" method="post">
              <input type="hidden" name="id" id="id">
                <div class="form-group">
                  <label for="exampleFormControlFile1">Edit Category</label>
                  <input type="text" name="category_name" class="form-control-file" id="edit_category_name" placeholder="Enter category name">
                </div>
              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="UPDATE CATEGORY">
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- ============== Edit Modal End ====================== -->


      <!-- ============== Data Table Start ====================== -->
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
                <button type="submit" class="add_category btn btn-info"style="float:right;margin-bottom: 10px;margin-right: 20px">Add
              </button>
                <!-- <button type="submit" class="edit_category btn btn-primary"style="float:right;">Edit</button>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>SL No</th>
                    <th>Category Name</th>
                    <th>Action</th>                   
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  if($category_data->num_rows() > 0){
                    $i = 0;
                    
                  foreach($category_data->result() as $row){
                    $i++;
                  ?>
                  <tr>                    
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row->category_name; ?></td>
                    <td> 
                    <a class="edit_category btn btn-primary" id="<?php echo $row->id;?>">
                        <i class="fas fa-edit"></i>
                    </a>
                      <a href="<?php echo base_url('Categories_controller/delete'); ?>/<?php echo $row->id; ?>" class="delete_category btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                      </a>
                    </td>                   
                  </tr>
                <?php
                  }
                }                  
                  ?>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      <!-- ============== Data Table End ======================== -->
            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
   
  </aside>
  <!-- /.control-sidebar -->

<?php $this->load->view("Header_Footer/footer.php"); ?>
