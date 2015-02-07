    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>ErpeelDev</h1>
          <h2 class="">Discuss</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="#">Forum</a></li>
            <li><a href="#">Discuss</a></li>
            <li class="active">Index</li>
          </ol>
        </div>
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
       <div class="row">
        
        <div class="col-sm-9 col-lg-10">
          <div class="block-web">
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <?php foreach($threads as $thread):?>
                  <tr>
                    <td><div class="media"> <a class="pull-left" href="<?php echo site_url('thread/talk/'.$thread->url_title);?>"> <img class="media-object" src="<?php echo base_url();?>assets/images/photos/user3.jpg" alt=""> </a>
                        <div class="media-body"> <span class="media-meta pull-right">Today at 7:30am</span>
                          <h4 class="text-primary"><?php echo $thread->title;?></h4>
                          <small class="text-muted"></small>
                          <p class="email-summary"><strong> "<?php echo $thread->content;?>"</strong></p>
                        </div>
                      </div></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div><!-- /table-responsive --> 
          </div><!--/ block-web -->
          <div>
          <ol class="pagination text-center pull-right"><?php echo $page; ?></ol>
          </div> 
        </div><!-- /col-sm-9 --> 
      </div><!--/row-->
      </div>
      <!--\\\\\\\ container  end \\\\\\-->
    </div>
    <!--\\\\\\\ content panel end \\\\\\-->