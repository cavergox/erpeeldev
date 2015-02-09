    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Admin</h1>
          <h2 class="">thread</h2>
        </div>
        <div class="pull-right">
        </div>
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->

      <?php if(isset($error)):?>
        <div class="alert alert-danger fade in">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <?php if (isset($error['title'])): ?>
                <div>- <?php echo $error['title']; ?></div>
          <?php endif; ?>
          <?php if (isset($error['content'])): ?>
                <div>- <?php echo $error['content']; ?></div>
          <?php endif; ?>  
        </div>
      <?php endif;?>

      <div class="row">
        <div class="col-md-9">
          <div class="block-web">
            <div class="header">
              <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
              <h3 class="content-header">Post New Thread</h3>
            </div>
            <div class="porlets-content">
              <form action="#" method="post" parsley-validate novalidate>
                <div class="form-group">
                  <label>Category</label>
                    <select name="row[category_id]" class="form-control" placeholder="Years Grade">
                      <option value ="0">- None -</option>
                      <?php foreach($categories as $category): ?>
                      <option value="<?php echo $category['id_category'];?>"><?php echo $category['name'];?></option>
                      <?php endforeach;?>  
                    </select>
                </div><!--/form-group-->
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="row[title]" parsley-trigger="change" required parsley-minlength="0" placeholder="Title of this article" class="form-control">
                </div><!--/form-group-->
                <div class="form-group">
                  <label>Content</label>
                      <textarea class="form-control ckeditor" name="row[content]" rows="3"></textarea>
                </div>

                <button class="btn btn-primary" name="btnAdd" type="submit">Submit</button>
                <button class="btn btn-default">Cancel</button>
              </form>
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div><!--/col-md-6-->
      </div><!--/row-->

    
      </div>
      <!--\\\\\\\ container  end \\\\\\-->
    </div>
    <!--\\\\\\\ content panel end \\\\\\-->