    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>ErpeelDev</h1>
          <h2 class="">Lounge</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Class</a></li>
            <li class="active">Web Development</li>
          </ol>
        </div>
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
        <div class="task_bar clearfix">
          <div class="task_bar_left">
            <label>Search entries:</label>
            <input name="" type="text" placeholder=" Search..." class="task_form"/>
            <button class="btn btn-primary btn-icon" type="button"><i class="fa fa-search"></i> </button>
          </div>
          <div class="task_bar_right">
            <label>Sorting:</label>
            <input name="" type="text" placeholder="SORT BY DATE" class="task_form"/>
          </div>
        </div>
        <div class="row">
          <!--\\\\\\\ row  start \\\\\\-->
          <div class="col-md-9">
            <?php foreach ($threads as $thread): ?>
            <section class="panel default red_border vertical_border h1">
              <div class="task-header red_task"><?php echo $thread->title;?><span><i class="fa fa-linux"></i>LINUX</span> </div>
                <div class="row task_inner inner_padding">
                  <div class="col-md-2">
                    <p><img src="<?php echo base_url();?>assets/images/hd-b.png" /></p>
                  </div>
                <div class="col-md-9">
                  <p align="justify"><?php echo $thread->content;?><img src="<?php echo base_url();?>assets/images/kaskus/traveller.gif"> <a href="<?php echo site_url('diskusi/thread');?>">more...</a></p>
                </div>
                </div>
              <div class="task-footer">
                <label class="pull-left"><i class="fa fa-clock-o"></i> <?php echo $thread->date_last_post;?></label>
                  <span class="label">:D</span>
                    <div class="pull-right">
                      <ul class="footer-icons-group">
                        <li><a href="#">10 <i class="fa fa-comment"></i></a></li>
                        <li><a href="#">100 <i class="fa fa-eye"></i></a></li>
                      </ul>
                    </div>
              </div>
              </section>
            <?php endforeach;?>
            <div>
              <ul class="pagination pagination-sm"><?php echo $page; ?></ul>
            </div>
          </div>
            
        </div>
        <!--\\\\\\\ row  end \\\\\\-->
      </div>
      <!--\\\\\\\ container  end \\\\\\-->
    </div>
    <!--\\\\\\\ content panel end \\\\\\-->