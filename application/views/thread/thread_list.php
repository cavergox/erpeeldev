    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>ErpeelDev</h1>
          <h2 class=""><?php echo $category->name;?></h2>
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
        <div class="row">
          <!--\\\\\\\ row  start \\\\\\-->
          <div class="col-sm-9 col-lg-9">
          <div class="block-web">
           <tr>
            <td>
            <p class="pull-left"><input name="" type="text" placeholder=" Search..." class="task_form"/>
            <button class="btn btn-primary btn-icon" type="button"><i class="fa fa-search"></i> </button></p> 
            <p class="pull-right"><a href="<?php echo site_url('thread/thread_create/'.$this->uri->segment(3));?>" class="btn btn-primary">Post New Thread </a></p></td>
            </tr> 
            <div class="table-responsive">
              <table class="table table-email">
                <tbody>
                <?php foreach($threads as $thread):?>
                  <tr>
                  
                    <td><a class="pull-left" href="#"> <img width="50%" height="50%" class="media-object" src="<?php echo base_url();?>assets/images/photos/user1.jpg" alt=""> </a></td>
                    <td></td>
                    <td>
                    <div class="media"> 
                        <div class="media-body">
                        <a class="text-muted" href="<?php echo site_url('thread/talk/'.$thread->url_title);?>"> 
                        <span class="media-meta pull-right">Jan 13 at 7:30am</span>
                          <p class="email-summary"><strong><?php echo ucfirst($thread->title);?></strong></p>
                          <small class="text-muted"></small>
                          <p class="email-summary"><?php echo ucfirst($thread->desc_title);?></p>
                        </a>
                        </div>
                    </div>
                    </td>
                  </tr>
                <?php endforeach;?>
                </tbody>
              </table>
            </div><!-- /table-responsive --> 
          </div><!--/ block-web -->
          </div>
        </div>

          <div class="row">
            <div class="col-sm-9 col-lg-9">
              <div class="block-web">
              <tr>
                <td>
                  <p class="pull-left"><?php echo 'Page '.$current.' of '.$total;?> messages</p> 
                  <p class="pull-right"><ol class="pagination text-center pull-right"><?php echo $page; ?></ol></p>
                </td>
              </tr> 
            </div>
         </div><!-- /col-sm-9 --> 
        </div>
       
        <!--\\\\\\\ row  end \\\\\\-->
      </div>
      <!--\\\\\\\ container  end \\\\\\-->
    </div>
    <!--\\\\\\\ content panel end \\\\\\-->