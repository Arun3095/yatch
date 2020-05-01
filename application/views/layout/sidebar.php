<!--
=========================================================
 Material Dashboard - v2.1.1
=========================================================

 Product Page: https://www.creative-tim.com/product/material-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/material-dashboard/blob/master/LICENSE.md)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>admin_template/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?=base_url()?>admin_template/assets/img/favicon.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Admin Dashboard</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?=base_url()?>admin_template/assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
 
</head>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="<?=base_url()?>admin_template/assets/img/sidebar-1.jpg">

      <div class="logo">
        <a href="<?=base_url()?>Dashboard" class="simple-text logo-normal">
        <?= $this->session->user_name ?>
       </a>
     </div>
     <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?=base_url()?>Dashboard">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>

         <li class="nav-item ">
          <a class="nav-link" href="<?=base_url()?>admin/Category">
            <i class="material-icons">category</i>
            <p>Category</p>
          </a>
        </li>

        <li class="nav-item ">
          <a class="nav-link" href="<?=base_url()?>admin/TourPackage">
            <i class="material-icons">Tour bus</i>
            <p>Tour Package</p>
          </a>
        </li>

        <li class="nav-item ">
          <a class="nav-link" href="<?=base_url()?>admin/Slide">
            <i class="material-icons">Slides</i>
            <p>Slides</p>
          </a>
        </li>

        <li class="nav-item ">
          <a class="nav-link" href="<?=base_url()?>admin/Transport">
            <i class="material-icons">commute</i>
            <p>Transport</p>
          </a>
        </li>

         <li class="nav-item ">
          <a class="nav-link" href="<?=base_url()?>admin/Blog">
            <i class="material-icons">speaker_notes</i>
            <p>Blog</p>
          </a>
        </li>

        <li class="nav-item ">
          <a class="nav-link" href="<?=base_url()?>admin/Testimonial/">
            <i class="material-icons">storage</i>
            <p>Testimonial</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="<?=base_url()?>AdminController/view_all_user">
            <i class="material-icons">how_to_reg</i>
            <p>Users</p>
          </a>
        </li>

         <li class="nav-item ">
          <a class="nav-link" href="<?=base_url()?>admin/About">
            <i class="material-icons">visibility</i>
            <p>About Us</p>
          </a>
        </li>

       
        <li class="nav-item active-pro ">
          <a class="nav-link" href="<?=base_url()?>Login/logout">
            <i class="material-icons">unarchive</i>
            <p>Log Out</p>
          </a>
        </li>
      </ul>
    </div>
  </div>