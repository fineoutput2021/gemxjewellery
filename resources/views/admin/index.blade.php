@extends('admin.base_template')
@section('main')



<!-- Start content -->
<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-sm-12">
<div class="page-title-box">
  <h4 class="page-title">Dashboard</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item active">Welcome to Jewellery Paradise Dashboard</li>
  </ol>


</div>
</div>
</div>
<!-- end row -->

<div class="page-content-wrapper">
<div class="row">
<div class="col-xl-3 col-md-6">
  <div class="card bg-primary mini-stat position-relative">
    <a href="<?=base_path?>view_category">
      <div class="card-body">
          <div class="mini-stat-desc">
              <h6 class="text-uppercase verti-label text-white-50">Categories</h6>
              <div class="text-white">
                  <h6 class="text-uppercase mt-0 text-white">Categories</h6>
                  <h3 class="mb-3 mt-0">
                    <?php

                    echo $category_count= App\adminmodel\Category::wherenull('deleted_at')->where('is_active', 1)->count();
                    ?>
                  </h3>
                  <!-- <div class="">
                      <span class="badge badge-light text-info"> +11% </span> <span class="ml-2">From previous period</span>
                  </div> -->
              </div>
              <div class="mini-stat-icon">
                  <i class="mdi mdi-cube-outline display-2"></i>
              </div>
          </div>
      </div>
</a>
  </div>
</div>
<div class="col-xl-3 col-md-6">
  <div class="card bg-primary mini-stat position-relative">
    <a href="<?=base_path?>view_subcategory">
      <div class="card-body">
          <div class="mini-stat-desc">
              <h6 class="text-uppercase verti-label text-white-50">SubCategories</h6>
              <div class="text-white">
                  <h6 class="text-uppercase mt-0 text-white">SubCategories</h6>
                  <h3 class="mb-3 mt-0">
<?php echo $subcategory_count= App\adminmodel\SubCategory::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->count(); ?>
                  </h3>
                  <!-- <div class="">
                      <span class="badge badge-light text-danger"> -29% </span> <span class="ml-2">From previous period</span>
                  </div> -->
              </div>
              <div class="mini-stat-icon">
                  <i class="mdi mdi-buffer display-2"></i>
              </div>
          </div>
      </div>
  </a>
  </div>
</div>
<div class="col-xl-3 col-md-6">
  <div class="card bg-primary mini-stat position-relative">
    <a href="<?=base_path?>view_product_category">
      <div class="card-body">
          <div class="mini-stat-desc">
              <h6 class="text-uppercase verti-label text-white-50"> Products</h6>
              <div class="text-white">
                  <h6 class="text-uppercase mt-0 text-white"> Products</h6>
                  <h3 class="mb-3 mt-0">

<?php echo $product_count= App\adminmodel\Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('is_subcat_delete', 0)->count(); ?>

                  </h3>
                  <!-- <div class="">
                      <span class="badge badge-light text-primary"> 0% </span> <span class="ml-2">From previous period</span>
                  </div> -->
              </div>
              <div class="mini-stat-icon">
                  <i class="mdi mdi-tag-text-outline display-2"></i>
              </div>
          </div>
      </div>
    </a>
  </div>
</div>
<div class="col-xl-3 col-md-6">
  <div class="card bg-primary mini-stat position-relative">
    <a href="<?=base_path?>view_team">
      <div class="card-body">
          <div class="mini-stat-desc">
              <h6 class="text-uppercase verti-label text-white-50"> Members</h6>
              <div class="text-white">
                  <h6 class="text-uppercase mt-0 text-white">Team Members</h6>
                  <h3 class="mb-3 mt-0">
<?php echo $team_count= App\adminmodel\Team::wherenull('deleted_at')->where('is_active', 1)->count(); ?>

                  </h3>
                  <!-- <div class="">
                      <span class="badge badge-light text-info"> +89% </span> <span class="ml-2">From previous period</span>
                  </div> -->
              </div>
              <div class="mini-stat-icon">
                  <i class="mdi mdi-briefcase-check display-2"></i>
              </div>
          </div>
      </div>
    </a>
  </div>
</div>




<div class="col-xl-3 col-md-6">
  <div class="card bg-primary mini-stat position-relative">
    <a href="<?=base_path?>new_orders">
      <div class="card-body">
          <div class="mini-stat-desc">
              <h6 class="text-uppercase verti-label text-white-50"> Orders</h6>
              <div class="text-white">
                  <h6 class="text-uppercase mt-0 text-white">All Orders</h6>
                  <h3 class="mb-3 mt-0">
<?php echo $team_count= App\frontendmodel\Order1::wherenull('deleted_at')->count(); ?>

                  </h3>
                  <!-- <div class="">
                      <span class="badge badge-light text-info"> +89% </span> <span class="ml-2">From previous period</span>
                  </div> -->
              </div>
              <div class="mini-stat-icon">
                  <i class="mdi mdi-briefcase-check display-2"></i>
              </div>
          </div>
      </div>
    </a>
  </div>
</div>



<div class="col-xl-3 col-md-6">
  <div class="card bg-primary mini-stat position-relative">
    <a href="<?=base_path?>view_user">
      <div class="card-body">
          <div class="mini-stat-desc">
              <h6 class="text-uppercase verti-label text-white-50"> Customer Accounts</h6>
              <div class="text-white">
                  <h6 class="text-uppercase mt-0 text-white">All Customer Accounts</h6>
                  <h3 class="mb-3 mt-0">
<?php echo $team_count= App\frontendmodel\User::wherenull('deleted_at')->where('is_active', 1)->count(); ?>

                  </h3>
                  <!-- <div class="">
                      <span class="badge badge-light text-info"> +89% </span> <span class="ml-2">From previous period</span>
                  </div> -->
              </div>
              <div class="mini-stat-icon">
                  <i class="mdi mdi-briefcase-check display-2"></i>
              </div>
          </div>
      </div>
    </a>
  </div>
</div>



<div class="col-xl-3 col-md-6">
  <div class="card bg-primary mini-stat position-relative">
    <a href="<?=base_path?>view_newsletter">
      <div class="card-body">
          <div class="mini-stat-desc">
              <h6 class="text-uppercase verti-label text-white-50"> Newsletter</h6>
              <div class="text-white">
                  <h6 class="text-uppercase mt-0 text-white">All Newsletters</h6>
                  <h3 class="mb-3 mt-0">
<?php echo $team_count= App\adminmodel\NewsLetter::wherenull('deleted_at')->count(); ?>

                  </h3>
                  <!-- <div class="">
                      <span class="badge badge-light text-info"> +19% </span> <span class="ml-2">From previous period</span>
                  </div> -->
              </div>
              <div class="mini-stat-icon">
                  <i class="mdi mdi-briefcase-check display-2"></i>
              </div>
          </div>
      </div>
    </a>
  </div>
</div>



<div class="col-xl-3 col-md-6">
  <div class="card bg-primary mini-stat position-relative">
    <a href="<?=base_path?>view_wholesale_inquiry">
      <div class="card-body">
          <div class="mini-stat-desc">
              <h6 class="text-uppercase verti-label text-white-50">Wholesale Inquiry</h6>
              <div class="text-white">
                  <h6 class="text-uppercase mt-0 text-white">All Wholesale Inquiries</h6>
                  <h3 class="mb-3 mt-0">
<?php echo $team_count= App\adminmodel\WholesaleInquiry::wherenull('deleted_at')->count(); ?>

                  </h3>
                  <!-- <div class="">
                      <span class="badge badge-light text-info"> +29% </span> <span class="ml-2">From previous period</span>
                  </div> -->
              </div>
              <div class="mini-stat-icon">
                  <i class="mdi mdi-briefcase-check display-2"></i>
              </div>
          </div>
      </div>
    </a>
  </div>
</div>


<div class="col-xl-3 col-md-6">
  <div class="card bg-primary mini-stat position-relative">
    <a href="<?=base_path?>view_custom_order">
      <div class="card-body">
          <div class="mini-stat-desc">
              <h6 class="text-uppercase verti-label text-white-50">Custom Order</h6>
              <div class="text-white">
                  <h6 class="text-uppercase mt-0 text-white">All Custom Orders</h6>
                  <h3 class="mb-3 mt-0">
<?php echo $team_count= App\adminmodel\CustomOrder::wherenull('deleted_at')->count(); ?>

                  </h3>
                  <!-- <div class="">
                      <span class="badge badge-light text-info"> +89% </span> <span class="ml-2">From previous period</span>
                  </div> -->
              </div>
              <div class="mini-stat-icon">
                  <i class="mdi mdi-briefcase-check display-2"></i>
              </div>
          </div>
      </div>
    </a>
  </div>
</div>





<div class="col-xl-3 col-md-6">
  <div class="card bg-primary mini-stat position-relative">
    <a href="<?=base_path?>view_contact">
      <div class="card-body">
          <div class="mini-stat-desc">
              <h6 class="text-uppercase verti-label text-white-50"> Contact</h6>
              <div class="text-white">
                  <h6 class="text-uppercase mt-0 text-white">All Contacts</h6>
                  <h3 class="mb-3 mt-0">
<?php echo $team_count= App\adminmodel\Contact::wherenull('deleted_at')->count(); ?>

                  </h3>
                  <!-- <div class="">
                      <span class="badge badge-light text-info"> +79% </span> <span class="ml-2">From previous period</span>
                  </div> -->
              </div>
              <div class="mini-stat-icon">
                  <i class="mdi mdi-briefcase-check display-2"></i>
              </div>
          </div>
      </div>
    </a>
  </div>
</div>


<div class="col-xl-3 col-md-6">
  <div class="card bg-primary mini-stat position-relative">
    <a href="<?=base_path?>view_user_catelogue">
      <div class="card-body">
          <div class="mini-stat-desc">
              <h6 class="text-uppercase verti-label text-white-50"> Catalogue</h6>
              <div class="text-white">
                  <h6 class="text-uppercase mt-0 text-white">All Catalogues</h6>
                  <h3 class="mb-3 mt-0">
<?php echo $team_count= App\frontendmodel\UserCatelogue::wherenull('deleted_at')->count(); ?>

                  </h3>
                  <!-- <div class="">
                      <span class="badge badge-light text-info"> +39% </span> <span class="ml-2">From previous period</span>
                  </div> -->
              </div>
              <div class="mini-stat-icon">
                  <i class="mdi mdi-briefcase-check display-2"></i>
              </div>
          </div>
      </div>
    </a>
  </div>
</div>


<div class="col-xl-3 col-md-6">
  <div class="card bg-primary mini-stat position-relative">
    <a href="<?=base_path?>view_product_ask_question">
      <div class="card-body">
          <div class="mini-stat-desc">
              <h6 class="text-uppercase verti-label text-white-50"> Product Ouestion</h6>
              <div class="text-white">
                  <h6 class="text-uppercase mt-0 text-white">All Product Ouestion</h6>
                  <h3 class="mb-3 mt-0">
<?php echo $team_count= App\adminmodel\AskQuestion::wherenull('deleted_at')->count(); ?>

                  </h3>
                  <!-- <div class="">
                      <span class="badge badge-light text-info"> +29% </span> <span class="ml-2">From previous period</span>
                  </div> -->
              </div>
              <div class="mini-stat-icon">
                  <i class="mdi mdi-briefcase-check display-2"></i>
              </div>
          </div>
      </div>
    </a>
  </div>
</div>



</div>
<!-- end row -->


</div>
<!-- end page content-->

</div> <!-- container-fluid -->

</div> <!-- content -->

@endsection
