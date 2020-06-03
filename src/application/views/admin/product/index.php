<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2> Product </h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li>
              </li>
              <a href="<?php echo base_url();?>admin/add_product" style="margin-left:10px;" class="btn btn-primary "> <span class="glyphicon glyphicon-plus"></span> add </a>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <div class="table-responsive">
               <table
                 class='table-striped'
                 id='student_collect_fees_data'
       					 data-toggle="table"
                 data-sortable="true"
       					 data-url="<?php echo base_url();?>admin/get_product_data"
       					 data-click-to-select="true"
       					 data-side-pagination="server"
       					 data-pagination="true"
       					 data-page-list="[50, 100, 200, 500, all]"
       					 data-search="true" data-show-columns="true"
       					 data-show-refresh="true"
                 data-trim-on-search="false"
       					 data-sort-name="id" data-sort-order="desc"
       					 data-mobile-responsive="true"
       					 data-use-row-attr-func="true" data-reorderable-rows="true"
       					 data-toolbar="#toolbar1" data-show-export="true"
       					 data-export-types="['json', 'xml', 'csv', 'txt', 'excel']"
       					 data-export-options='{
       					  "fileName": "Users List",
       					 }'
       					 data-query-params="queryParams_2">
       					<thead>
           					<tr>
           						<th data-field="srno">Sr. No</th>
                      <th data-field="name">Name</th>
           						<th data-field="category_id" data-sortable="true">Category</th>
                      <th data-field="subcategory_id" data-sortable="true">Sub Category</th>
                      <th data-field="description" data-sortable="true">description</th>
                      <th data-field="price" data-sortable="true">price</th>
                      <th data-field="in_stock" data-sortable="true">In Stock</th>
           						<th data-field="action">Action</th>
           					</tr>
       					</thead>
       				</table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
      function queryParams_2(p){
          return {
              limit:p.limit,
              sort:p.sort,
              order:p.order,
              offset:p.offset,
              search:p.search
          };
      }
</script>
