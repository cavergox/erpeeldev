<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<!-- required css  -->
<link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/admin.css" rel="stylesheet" type="text/css" />

<!-- plugin css  -->
<link href="<?php echo base_url();?>assets/plugins/data-tables/DT_bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/plugins/advanced-datatable/css/demo_table.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/plugins/advanced-datatable/css/demo_page.css" rel="stylesheet">


</head>
<body class="light_theme  fixed_header left_nav_fixed">
<div class="wrapper">
  <!--\\\\\\\ wrapper Start \\\\\\-->
  <div class="header_bar">
    <!--\\\\\\\ header Start \\\\\\-->
    <div class="brand">
      <!--\\\\\\\ brand Start \\\\\\-->
      <div class="logo" style="display:block"><span class="theme_color">Erpeel</span>Dev</div>
      <div class="small_logo" style="display:none"><img src="<?php echo base_url();?>assets/images/s-logo.png" width="50" height="47" alt="s-logo" /> <img src="<?php echo base_url();?>assets/images/r-logo.png" width="122" height="20" alt="r-logo" /></div>
    </div>
    <!--\\\\\\\ brand end \\\\\\-->
    <div class="header_top_bar">
      <!--\\\\\\\ header top bar start \\\\\\-->
      <a href="javascript:void(0);" class="menutoggle"> <i class="fa fa-bars"></i> </a>
      <!-- <div class="top_left">
        <div class="top_left_menu">
          <ul>
            <li> <a href="javascript:void(0);"> <i class="fa fa-repeat"></i> </a> </li>
            <li> <a href="javascript:void(0);"> <i class="fa fa-th-large"></i> </a> </li>
          </ul>
        </div>
      </div> -->
      <a href="javascript:void(0);" class="add_user" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-square"></i> <span> New Thread</span> </a>
      <div class="top_right_bar">
        <div class="user_admin dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"><img src="<?php echo base_url();?>assets/images/user.png" /><span class="user_adminname"><?php echo $this->session->userdata('rpl_username');?></span> <b class="caret"></b> </a>
          <ul class="dropdown-menu">
            <div class="top_pointer"></div>
            <li> <a href="profile.html"><i class="fa fa-user"></i> Profile</a> </li>
            <li> <a href="help.html"><i class="fa fa-question-circle"></i> Help</a> </li>
            <li> <a href="settings.html"><i class="fa fa-cog"></i> Setting </a></li>
            <li> <a href="<?php echo site_url('user/logout');?>"><i class="fa fa-power-off"></i> Logout</a> </li>
          </ul>
        </div>
        <a href="javascript:;" class="toggle-menu menu-right push-body jPushMenuBtn rightbar-switch"><i class="fa fa-comment chat"></i></a>
      </div>
    </div>
    <!--\\\\\\\ header top bar end \\\\\\-->
  </div>
  <!--\\\\\\\ header end \\\\\\-->
  <div class="inner">
    <!--\\\\\\\ inner start \\\\\\-->
        <div class="left_nav">
      <!--\\\\\\\left_nav start \\\\\\-->
      <div class="search_bar"> <i class="fa fa-search"></i>
        <input name="" type="text" class="search" placeholder="Search Dashboard..." />
      </div>
      <div class="left_nav_slidebar">
        <ul>
          <?php if($this->session->userdata('admin_area') != 0): ?>
          <li <?php if($this->uri->segment(1) == 'admin') { echo 'class="left_nav_active theme_border"';}?>><a href="javascript:void(0);"><i class="fa fa-home"></i> Admin  <span class="plus"><i class="fa fa-plus"></i></span> </a>
              <ul <?php if($this->uri->segment(1) == 'admin') { echo'class="opened" style="display:block"';}?>>
              <li> <a href="<?php echo site_url('admin/category_view');?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Category</b> </a> </li>
              <li> <a href="<?php echo site_url('admin/thread_view');?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Thread</b> </a> </li>
              <li> <a href="<?php echo site_url('#');?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Rule</b> </a> </li>
              <li> <a href="<?php echo site_url('admin/user_view');?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>User</b> </a> </li>
              </ul>
          </li>
          <?php endif;?>
          <li <?php if($this->uri->segment(3) == 'lounge') { echo 'class="left_nav_active theme_border"';}?>><a href="<?php echo base_url('');?>thread/category/lounge"><i class="fa fa-coffee"></i> Lounge </span> </a></li>
          <li <?php if($this->uri->segment(3) == 'discuss') { echo 'class="left_nav_active theme_border"';}?>><a href="<?php echo base_url();?>thread/category/discuss"><i class="fa fa-users"></i> Discuss  </a></li>
          <li <?php if($this->uri->segment(3) == 'stage') { echo 'class="left_nav_active theme_border"';}?>><a href="<?php echo site_url('thread/category/stage');?>"> <i class="fa fa-th-large"></i> Class</a></li>
          <li <?php if($this->uri->segment(3) == 'project') { echo 'class="left_nav_active theme_border"';}?>><a href="<?php echo site_url('#');?>"> <i class="fa fa-stack-overflow"></i> Project</span> </a></li>
          <li <?php if($this->uri->segment(3) == 'library') { echo 'class="left_nav_active theme_border"';}?>><a href="<?php echo site_url('thread/category/library');?>"> <i class="fa fa-book"></i> Library</span> </a></li>
        </ul>
      </div>
    </div>
    <!--\\\\\\\left_nav end \\\\\\-->