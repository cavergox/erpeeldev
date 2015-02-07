    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Admin</h1>
          <h2 class="">Category</h2>
        </div>
        <div class="pull-right">
        </div>
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
      <?php if(isset($tmp_success)):?>
        <div class="alert alert-success fade in">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <strong>Great :D</strong> 
          Category Updated. 
        </div>
      <?php endif;?>

      <?php if(isset($error)):?>
        <div class="alert alert-danger fade in">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <strong>Oppss !</strong> 
          <?php if (isset($error['name'])): ?>
                <div>- <?php echo $error['name']; ?></div>
          <?php endif; ?>
          <?php if (isset($error['url'])): ?>
                <div>- <?php echo $error['url']; ?></div>
          <?php endif; ?>  
        </div>
      <?php endif;?>

      <div class="row">
        <div class="col-md-12">
          <div class="block-web">
            <div class="header">
              <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
              <h3 class="content-header">Edit Category</h3>
            </div>
            <div class="porlets-content">
              <form action="#" method="post" parsley-validate novalidate>
                <div class="form-group">
                  <label>Name</label>
                  <input type="hidden" name="row[id_category]" value="<?php echo $category->id_category;?>"/>
                  <input type="hidden" name="row[name_category]" value="<?php echo $category->name;?>"/>
                  <input type="hidden" name="row[url_category]" value="<?php echo $category->url;?>"/>

                  <input type="text" name="row[name]" parsley-trigger="change" required parsley-minlength="0" value="<?php echo $category->name;?>" class="form-control">
                </div><!--/form-group-->
                <div class="form-group">
                  <label>Url Friendly</label>
                  <input type="text" name="row[url]" parsley-trigger="change" required value="<?php echo $category->url;?>" class="form-control">
                </div><!--/form-group-->
                <div class="form-group">
                  <label>Parent Category</label>
                    <select name="row[parent_id]" class="form-control" value="Years Grade">
                      <option <?php if ($category->id_category == 0):?> selected="selected" <?php endif;?> value="0">- None -</option>
                      <?php foreach($categories as $cat):?>
                      <?php if($category->id_category != $cat['id_category']):?>
                      <option <?php if($category->parent_id == $cat['id_category']):?> selected="selected" <?php endif;?> value="<?php echo $cat['id_category'];?>"><?php echo $cat['name'];?></option>
                      <?php else: ?>
                      <option disabled value="<?php echo $cat['id_category'];?>"><?php echo $cat['name'];?></option>
                      <?php endif; ?>
                      <?php endforeach;?>  
                    </select>
                </div><!--/form-group-->
                
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