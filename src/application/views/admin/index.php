<style>

.inforide {
  box-shadow: 1px 2px 8px 0px #f1f1f1;
  background-color: beige;
  border-radius: 8px;
  height: 125px;
}

.rideone img {
  width: 70%;
}

.ridetwo img {
  width: 60%;
}

.ridethree img {
  width: 50%;
}

.rideone {
  background-color: #6CC785;
  padding-top: 25px;
  border-radius: 8px 0px 0px 8px;
  text-align: center;
  height: 125px;
  margin-left: 15px;
}

.ridetwo {
  background-color: #9A75FE;
  padding-top: 30px;
  border-radius: 8px 0px 0px 8px;
  text-align: center;
  height: 125px;
  margin-left: 15px;
}

.ridethree {
  background-color: #4EBCE5;
  padding-top: 35px;
  border-radius: 8px 0px 0px 8px;
  text-align: center;
  height: 125px;
  margin-left: 15px;
}

.fontsty {
  margin-right: -15px;
}

.fontsty h2{
  color: #6E6E6E;
  font-size: 35px;
  margin-top: 15px;
  text-align: right;
  margin-right: 30px;
}

.fontsty h4{
  color: #6E6E6E;
  font-size: 25px;
  margin-top: 20px;
  text-align: right;
  margin-right: 30px;
}

</style>
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >

          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">
                <div class="row x_title">
                  <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
                      <div class="inforide">
                        <div class="row">
                            <a href="<?php echo base_url();?>admin/category">
                              <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone">
                                  <img src="https://vignette.wikia.nocookie.net/nationstates/images/2/29/WS_Logo.png/revision/latest?cb=20080507063620">
                              </div>
                              <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                                  <h4>category</h4>
                              </div>
                            </a>
                        </div>
                      </div>
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
                      <div class="inforide">
                        <div class="row">
                          <a href="<?php echo base_url();?>admin/products">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridetwo">
                                <img src="https://vignette.wikia.nocookie.net/nationstates/images/2/29/WS_Logo.png/revision/latest?cb=20080507063620">
                            </div>
                            <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                                <h4>Product</h4>
                            </div>
                          </a>
                        </div>
                      </div>
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
                      <div class="inforide">
                        <div class="row">
                          <a href="<?php echo base_url();?>admin/sub_category">
                              <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridethree">
                                  <img src="https://vignette.wikia.nocookie.net/nationstates/images/2/29/WS_Logo.png/revision/latest?cb=20080507063620">
                              </div>
                              <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                                  <h4>Sub category</h4>
                              </div>
                            </a>
                        </div>
                      </div>
                  </div>
                </div>

                <!-- <div class="col-md-9 col-sm-9 ">
                </div>
                <div class="col-md-3 col-sm-3  bg-white">
                </div>
                <div class="clearfix"></div> -->
              </div>
            </div>
          </div>
          <br />
        </div>
        <!-- /page content -->
