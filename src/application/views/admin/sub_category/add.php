<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2> Add Sub Category</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <form class="" action="#" method="post" novalidate enctype="multipart/form-data">

              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align"> Category<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                  <select class="form-control" required="required" name="parent_id">
                    <?php if(isset($category) and $category != NULL){
                      foreach ($category as $row){
                        echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                      }
                    }?>
                  </select>
                </div>
              </div>

              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align"> Category Name<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                  <input class="form-control" name="name" placeholder="Name" maxlength="30" minlength="3" data-validate-length-range="6" data-validate-words="1" required="required" />
                </div>
              </div>

              <div class="ln_solid">
                <div class="form-group">
                  <div class="col-md-6 offset-md-3">
                    <button type='submit' name="submit" value="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            </form>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
