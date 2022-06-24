<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<title>Gemx Jewellery Admin</title>
<meta content="Admin Dashboard" name="description" />
<meta content="Themesbrand" name="author" />
<link rel="shortcut icon" href="<?=base_path?>frontend/assets/img/jewl/logopart1.png">

<!-- <link rel="stylesheet" href="../plugins/morris/morris.css"> -->
<!-- DataTables -->
      <link href="<?=base_path?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <link href="<?=base_path?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <!-- Responsive datatable examples -->
      <link href="<?=base_path?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<link href="<?=base_path?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="<?=base_path?>assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_path?>assets/css/icons.css" rel="stylesheet" type="text/css">
<link href="<?=base_path?>assets/css/style.css" rel="stylesheet" type="text/css">

<style>
.status-activ
{
background-color: green;
color: white;
text-align: center;
border-radius: 20px;

}
.status-inactiv
{
background-color: Red;
color: white;
text-align: center;
border-radius: 20px;

}
.dropdown-menu{
  padding: 10px;
  line-height: 1.5
}
</style>
</head>

<body>

<input type="hidden" id="base_path"  value="<?=base_path;?>">
<!-- Begin page -->
<div id="wrapper">

<!-- Top Bar Start -->
<div class="topbar">

<!-- LOGO -->
<div class="topbar-left">
<a href="<?=base_path?>admin_index" class="logo">
<span>
<!-- <img src="<?=base_path?>frontend/assets/img/page_1.jpg" alt="" style="width: 150px;height: 45px;"> -->
Gemx Jewellery
</span>
<i>
<!-- <img src="<?=base_path?>frontend/assets/img/page_1.jpg" alt=""  style="width: 50px;height: 40px;"> -->
Gemx Jewellery
</i>
</a>
</div>

<nav class="navbar-custom">

<ul class="navbar-right d-flex list-inline float-right mb-0">
<!-- <li class="dropdown notification-list d-none d-sm-block">
<form role="search" class="app-search">
    <div class="form-group mb-0">
        <input type="text" class="form-control" placeholder="Search..">
        <button type="submit"><i class="fa fa-search"></i></button>
    </div>
</form>
</li> -->

<!-- <li class="dropdown notification-list">
<a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
    <i class="mdi mdi-bell noti-icon"></i>
    <span class="badge badge-pill badge-info noti-icon-badge">3</span>
</a>
<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">

    <h6 class="dropdown-item-text">
        Notifications (37)
    </h6>
    <div class="slimscroll notification-item-list">

        <a href="javascript:void(0);" class="dropdown-item notify-item active">
            <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
            <p class="notify-details">Your order is placed<span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
        </a>

        <a href="javascript:void(0);" class="dropdown-item notify-item">
            <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
            <p class="notify-details">New Message received<span class="text-muted">You have 87 unread messages</span></p>
        </a>

        <a href="javascript:void(0);" class="dropdown-item notify-item">
            <div class="notify-icon bg-info"><i class="mdi mdi-flag"></i></div>
            <p class="notify-details">Your item is shipped<span class="text-muted">It is a long established fact that a reader will</span></p>
        </a>

        <a href="javascript:void(0);" class="dropdown-item notify-item">
            <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
            <p class="notify-details">Your order is placed<span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
        </a>

        <a href="javascript:void(0);" class="dropdown-item notify-item">
            <div class="notify-icon bg-danger"><i class="mdi mdi-message"></i></div>
            <p class="notify-details">New Message received<span class="text-muted">You have 87 unread messages</span></p>
        </a>
    </div>

    <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
        View all <i class="fi-arrow-right"></i>
    </a>
</div>
</li> -->
<li class="dropdown notification-list">
<div class="dropdown notification-list nav-pro-img">
    <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

<?php if(!empty(Session::get('admin_data'))) {

      if(!empty(Session::get('admin_data'))){
      $admin_image= Session::get('admin_image');
      }else{
        $admin_image= "assets/images/users/user-4.jpg";
      }

  ?>
        <img src="<?=base_path.$admin_image?>" alt="user" class="rounded-circle">

<?php } else{ ?>

      <img src="<?=base_path?>assets/images/users/user-4.jpg" alt="user" class="rounded-circle">

<?php } ?>

    </a>
    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
        <!-- item-->
        <a class="dropdown-item" href="<?=base_path?>admin_profile"><i class="mdi mdi-account-circle m-r-5"></i> Profile</a>

        <div class="dropdown-divider"></div>

<?php if(!empty(Session::get('admin_data'))) { ?>

        <a class="dropdown-item text-danger" href="<?=base_path?>admin_logout"><i class="mdi mdi-power text-danger"></i> Logout</a>
<?php } ?>

    </div>
</div>
</li>

</ul>

<ul class="list-inline menu-left mb-0">
<li class="float-left">
<button class="button-menu-mobile open-left waves-effect waves-light">
    <i class="mdi mdi-menu"></i>
</button>
</li>
<li class="d-none d-sm-block">

</li>
</ul>

</nav>

</div>
<!-- Top Bar End -->

<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
<div class="slimscroll-menu" id="remove-scroll">

<!--- Sidemenu -->
<div id="sidebar-menu">
<!-- Left Menu Start -->
<ul class="metismenu" id="side-menu">
<li class="menu-title">Main</li>

<?php


$admin_services= Session::get('services');


$ser=json_decode($admin_services);
// print_r($ser); die();

if($ser[0]=="999"){

$admin_sidebar=App\adminmodel\AdminSidebar::orderBy('seq','asc')->get();


// print_r($admin); die();
if(!empty($admin_sidebar)){
  foreach ($admin_sidebar as $sidebar) {
?>

<?php if($sidebar->url == "#"){?>


<li>

    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-email"></i><span> <?=$sidebar->name;?> <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>


    <ul class="submenu">

      <?php
      $admin_sidebar2=App\adminmodel\AdminSidebar2::where('main_id', $sidebar->id)->get();
      // print_r($admin); die();
      if(!empty($admin_sidebar2)){
        foreach ($admin_sidebar2 as $sidebar2) {
      ?>

        <li><a href="<?=base_path.$sidebar2->url?>">
          <?=$sidebar2->name;?>
        </a></li>
        <!-- <li><a href="<?=base_path?>view_team">View Team</a></li> -->
        <?php  }  }   ?>
    </ul>


</li>
<?php }else{ ?>

  <li>
      <a href="<?=base_path.$sidebar->url?>" class="waves-effect"><i class="mdi mdi-email"></i><span> <?=$sidebar->name;?>  </span></a>

  </li>

<?php }?>

<?php
 }
}
?>

<?php } else{

foreach ($ser as $s) {



  $sidebar=App\adminmodel\AdminSidebar::where('id', $s)->first();


  // print_r($admin); die();
  if(!empty($sidebar)){

  ?>

  <?php if($sidebar->url == "#"){?>


  <li>

      <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-email"></i><span> <?=$sidebar->name;?> <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>


      <ul class="submenu">

        <?php
        $admin_sidebar2=App\adminmodel\AdminSidebar2::where('main_id', $sidebar->id)->get();
        // print_r($admin); die();
        if(!empty($admin_sidebar2)){
          foreach ($admin_sidebar2 as $sidebar2) {
        ?>

          <li><a href="<?=base_path.$sidebar2->url?>">
            <?=$sidebar2->name;?>
          </a></li>
          <!-- <li><a href="<?=base_path?>view_team">View Team</a></li> -->
          <?php  }  }   ?>
      </ul>


  </li>
  <?php }else{ ?>

    <li>
        <a href="<?=base_path.$sidebar->url?>" class="waves-effect"><i class="mdi mdi-email"></i><span> <?=$sidebar->name;?>  </span></a>

    </li>

  <?php }?>

  <?php

  }
  ?>



<?php } } ?>

</ul>

</div>
<!-- Sidebar -->
<div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
