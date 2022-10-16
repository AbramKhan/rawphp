<?php require_once 'inc/header.php'?>

<section class="p-2 main-section">
  <div class="container">
          <div class="row ">
                <div class="col-6">
                  <h3>Add New Slider</h3>
                </div>
                <div class="col-6 text-right">
                <a href="create.php" class="btn btn-primary">  Add New Slider</a>
                </div>
          </div>
          <hr>
        <div class="row justify-content-center my-3">
          <div class="col-md-8">
          <div class="card">
             <div class="card-header">    
             <h3>Add New Slider</h3>
             </div>
              <div class="card-body">
                  <form method="post" action="" enctype="multipart/form-data" data-url="save-slider" id="create-form">
                    <div class="form-group row">
                      <label for="title" class="col-sm-2 col-form-label">Title</label>
                      <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="title">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="sub_title" class="col-sm-2 col-form-label">Sub Title</label>
                      <div class="col-sm-10">
                        <input type="text" name="sub_title" class="form-control" id="sub_title">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="url_1" class="col-sm-2 col-form-label">Url 1</label>
                      <div class="col-sm-10">
                        <input type="url" name="url_1" class="form-control" id="url_1">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="start_date" class="col-sm-2 col-form-label">Start Data</label>
                      <div class="col-sm-10">
                        <input type="text" name="start_date" class="form-control datepicker" id="start_date">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="end_date" class="col-sm-2 col-form-label">End Data</label>
                      <div class="col-sm-10">
                        <input type="text" name="end_date" class="form-control datepicker" id="end_date">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="image" class="col-sm-2 col-form-label">image</label>
                      <div class="col-sm-10"> 
                        <input type="file" name="image"  id="image" onchange="imageView(this)">
                        <img src="https://via.placeholder.com/80 " class="image-view" alt="image">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-10">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="active" name="status" class="custom-control-input" value="1" checked>
                          <label for="active" class="custom-control-label" >Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="inactive" name="status" value="0" class="custom-control-input" >
                          <label for="inactive" class="custom-control-label">Inactive</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group text-right">
                      <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> Add Slider</button>
                    </div>
                </form>
              </div>
         </div>
          </div>
        </div>
  
  </div>
</section>

<?php require_once 'inc/footer.php'?>