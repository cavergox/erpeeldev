    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Admin</h1>
          <h2 class="">User</h2>
        </div>
        <div class="pull-right">
        </div>
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
     <div id="main-content">
    <div class="page-content">
      
      <?php if(isset($tmp_success)):?>
        <div class="alert alert-success fade in">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <strong>Great :D</strong> 
          Thread was updated. 
        </div>
      <?php endif;?>
      <div class="row">
        <div class="col-md-12">
          <div class="block-web">
           <div class="header">
              <div class="actions"> 
              <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> 
              </div>
              <h3 class="content-header">ErpeelDev Thread</h3>
            </div>
         <div class="porlets-content">
            <div class="table-responsive">
                <div class="clearfix">
                  <a class="btn btn-primary" href="<?php echo site_url('admin/user_add');?>">Add New <i class="fa fa-plus"></i></a>
                </div>
                
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Thread</th>
                      <th class="center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach($threads as $thread) : ?>
                    <tr>
                    <td><?php echo $no;?></td>
                    <td>
                      <a href="<?php echo site_url('thread/talk/'.$thread->url_title);?>"><?php echo $thread->title;?></a>
                      <span style="display:block;font-size: 10px; font-style:italic;"><?php echo $thread->category_name;?></span>
                    </td>
                    <td class="center">
                      <a href="<?php echo site_url('admin/thread_edit').'/'.$thread->id_thread;?>" class="btn btn-success">View & Edit</a>
                      <a href="<?php echo site_url('admin/thread_delete').'/'.$thread->id_thread?>" class="btn btn-danger" onclick="return confirm('Are You Sure Delete This User ? ')">Delete</a>
                    </td>
                    </tr>
                    <?php $no++; endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Thread</th>
                      <th class="center">Action(s)</th>
                    </tr>
                  </tfoot>
                </table>
              </div><!--/table-responsive-->
            </div><!--/porlets-content-->
            
            
          </div><!--/block-web--> 
        </div><!--/col-md-12--> 
      </div><!--/row-->
            
        </div><!--/page-content end--> 
  </div><!--/main-content end--> 

      </div>
      <!--\\\\\\\ container  end \\\\\\-->
    </div>
    <!--\\\\\\\ content panel end \\\\\\-->