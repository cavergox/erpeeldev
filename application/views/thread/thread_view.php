<div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>CLASS</h1>
          <h2 class="">Web Programming</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="#">Web Programming</a></li>
            <li><a href="#">Framework</a></li>
            <li class="active">Code Igniter</li>
          </ol>
        </div>
      </div>
  <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
        <?php if(isset($tmp_success)):?>
        <div class="alert alert-success fade in">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <strong>Great :D</strong> 
          Posted Success. 
        </div>
        <?php endif;?>
        <div class="row">
          <!--\\\\\\\ row  start \\\\\\-->
          <div class="col-md-12">
            <section class="panel default blue_border vertical_border h1">
              <div class="task-header red_task"><?php echo $thread->title;?></div>
                <div class="row task_inner inner_padding">
                  <div class="col-md-2">
                    <p><img src="<?php echo base_url()?>assets/images/hd-b.png" /></p>
                  </div>
                  <div class="col-md-9">
                    <p align="justify">
                      <?php echo $thread->content;?>
                    </p>
                    </div>
              </div>
              <div class="task-footer">
              <label class="pull-left">
              <i class="fa fa-clock-o"></i> 13 December 2014 08:08 am
              </label>
              <span class="label">:D</span>
              <div class="pull-right">
                <ul class="footer-icons-group">
                  <li><a href="#">10 <i class="fa fa-reply"></i></a></li>
                  <li><a href="#">15 <i class="fa fa-thumbs-o-up"></i></a></li>
                </ul>
              </div>
              </div>
            </section>
            </div>
          </div>
              
          <div class="row">
          <!--\\\\\\\ row  start \\\\\\-->
          <div class="col-md-12">
            <?php foreach($posts as $post):?>
            <section class="panel default h1">
              <div class="row task_inner inner_padding">
                <div class="col-sm-2">
                  <p><img src="<?php echo base_url()?>assets/images/hd-a.png" /></p>
                </div>
              <div class="col-sm-9">
                <p><b><?php echo $post->username;?></b></p>
                <p align="justify"><?php echo $post->post;?></p>
              </div>  
              </div>

            </section>
            <?php endforeach;?>
            <ol class="pagination text-center pull-right"><?php echo $page; ?></ol>
          </div>
          </div>
        <!--\\\\\\\ row  end \\\\\\-->   

          <section class="panel default h1">
          <div class="row">
            <div class="col-md-12">
              <div class="block-web">
                <div class="porlets-content">
                  <div class="form">
                    <form action="#" method="POST" class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2">Reply Thread</label>
                        <div class="col-sm-10">
                          <input type="hidden" name="row[thread_id]" value="<?php echo $thread->id_thread;?>">
                          <input type="hidden" name="row[user_id]" value="1">
                          <input type="hidden" name="row[date_add]" value="<?php echo date('Y-m-d H:i:s');?>">
                          <textarea class="form-control ckeditor" name="row[post]" rows="2"></textarea>
                        </div>
                      </div>
                      <button class="btn btn-primary" name="btnAdd" type="submit">Reply</button>
                    </form>
                  </div>
                </div><!--/porlets-content--> 
              </div><!--/block-web--> 
            </div><!--/col-md-12-->
          </div><!--/row--> 
          </section>   
         

  </div>
  <!--\\\\\\\ container  end \\\\\\-->
</div>
<!--\\\\\\\ content panel end \\\\\\-->