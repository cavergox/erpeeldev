    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Stage</h1>
          <h2 class="">Come on This is Hall of Fame :v</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Class</a></li>
            <li class="active">All</li>
          </ol>
        </div>
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->

        <div class="row">
          <div class="col-sm-12">
            <div class="row">
            <?php
            foreach($stages as $stage):
            ?>
              <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="thumb">
                  <a href="<?php echo site_url('thread/category/'.$stage->name);?>"><div class="thumb_image"><img src="<?php echo base_url().'assets/images/category/'.$stage->image;?>"/></div></a>
                </div>
              </div>
            <?php endforeach; ?>       
            </div>
          </div>

        </div>
        <br/>
      </div>
      <!--\\\\\\\ container  end \\\\\\-->
    </div>
    <!--\\\\\\\ content panel end \\\\\\-->