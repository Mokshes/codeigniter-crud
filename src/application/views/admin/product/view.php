<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2> View Product</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <?php
              if(isset($users->image) and trim($users->image) != NULL){
                echo '
                <div class="field item form-group">
                  <label class="col-form-label col-md-3 col-sm-3  label-align"> Current Image <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6">
                    <img src="'.base_url().PRODUCT_IMAGE_PATH.$users->$image.'" width="300px" height="300px" class="img-fluid" alt="Responsive image">
                  </div>
                </div>
                ';
              }

            echo "<br> name :- ".$users->name;
            echo "<br> price :- ".$users->price;
            echo "<br> Description :- ".$users->description;
            echo "<br> Is Stock :- ".$users->in_stock;
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
