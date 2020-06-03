<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2> Add Product</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <form class="" action="#" method="post" novalidate enctype="multipart/form-data">
              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align"> product Image <span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                  <input type="file" class="form-control" name="image" required="required" />
                </div>
              </div>

              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align"> Product Name<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                  <input class="form-control" name="name" placeholder="Name" maxlength="30" minlength="3" data-validate-length-range="6" data-validate-words="1" required="required" />
                </div>
              </div>

              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align"> Category <span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <select class="form-control" required="required" name="category">
                      <?php if(isset($category) and $category != NULL){
                        foreach ($category as $row){
                          echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                        }
                      }?>
                    </select>
                </div>
              </div>

              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align"> Sub Category <span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <select class="form-control" required="required" name="sub_category">
                        <?php if(isset($sub_category) and $sub_category != NULL){
                          foreach ($sub_category as $row){
                            echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                          }
                        }?>
                    </select>
                </div>
              </div>

              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align"> Price <span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                  <input type="number" class="form-control" name="price" required="required" />
                </div>
              </div>

              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align"> In Stock <span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                  <input type="number" class="form-control" name="in_stock" placeholder="20" required="required" />
                </div>
              </div>

              <div class="field item form-group">
                <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
                <label class="col-form-label col-md-3 col-sm-3  label-align"> Description <span class="required">*</span> </label>
                <div class="col-md-6 col-sm-6">
                    <textarea name="description" class="form-control"></textarea>
                      <script>
                          CKEDITOR.replace( 'description' );
                      </script>
                      <small class="help-block with-errors text-danger"></small>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/validator/multifield.js"></script>
<script src="<?php echo base_url(); ?>vendors/validator/validator.js"></script>

<script>
  // initialize a validator instance from the "FormValidator" constructor.
  // A "<form>" element is optionally passed as an argument, but is not a must
  var validator = new FormValidator({ "events": ['blur', 'input', 'change'] }, document.forms[0]);
  // on form "submit" event
  document.forms[0].onsubmit = function (e) {
    var submit = true,
      validatorResult = validator.checkAll(this);
    console.log(validatorResult);
    return !!validatorResult.valid;
  };
  // on form "reset" event
  document.forms[0].onreset = function (e) {
    validator.reset();
  };
  // stuff related ONLY for this demo page:
  $('.toggleValidationTooltips').change(function () {
    validator.settings.alerts = !this.checked;
    if (this.checked)
      $('form .alert').remove();
  }).prop('checked', false);
</script>
