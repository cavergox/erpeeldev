<div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <?php foreach($threads as $thread):?>
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1><?php echo ucfirst($thread->name);?></h1>
          <h2 class=""><?php echo humanize($this->uri->segment(3));?></h2>
        </div>
        <!-- <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="#">Web Programming</a></li>
            <li><a href="#">Framework</a></li>
            <li class="active">Code Igniter</li>
          </ol>
        </div> -->
      </div>
  <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
        <?php if(isset($tmp_success)):?>
        <div class="alert alert-success fade in">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <strong>Great :D</strong> 
          Post Reply Success. 
        </div>
        <?php endif;?>
        <?php if (isset($tmp_success_new)): ?>
        <div class="alert alert-success fade in">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <strong>Good :D</strong> 
          New Thread Posted. 
        </div>
        <?php endif; ?>
        <div class="row">
          <!--\\\\\\\ row  start \\\\\\-->
          <div class="col-md-8">
            
            <section class="panel">
              <div class="task-header red_task">
                  <tr>
                    <td><a class="pull-left" href="#"> <img width="50%" height="50%" class="media-object" src="<?php echo base_url();?>assets/images/photos/user1.jpg" alt=""> </a></td>
                    <td>
                    <div class="media"> 
                        <div class="media-body">                        
                          <p class="email-summary"><strong><?php echo ucfirst($thread->title);?></strong></p>
                        </div>
                    </div>
                    </td>
                  </tr>
              </div>
                <div class="row task_inner inner_padding">
                  <div class="col-md-12">
                      <?php echo $thread->content;?>
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
            <?php endforeach;?>
            </div>
          </div>
              
          <div class="row">
          <!--\\\\\\\ row  start \\\\\\-->
          <div class="col-md-9">
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
            <section>
            <?php endforeach;?>
            <div class="pull-left">
            <a href="<?php echo site_url('thread/reply/'.$this->uri->segment(3));?>" class="btn btn-primary" name="btnAdd" type="submit">Reply Thread</a>
            </div>
            <div class="pull-right">
            <ol class="pagination text-center pull-right"><?php echo $page; ?></ol>
            </div>
            </section>
          </div>
          </div>
        <!--\\\\\\\ row  end \\\\\\-->   
  </div>
  <!--\\\\\\\ container  end \\\\\\-->
</div>
<!--\\\\\\\ content panel end \\\\\\-->