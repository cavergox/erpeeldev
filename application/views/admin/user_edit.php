    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>User</h1>
          <h2 class="">Edit User</h2>
        </div>
        <div class="pull-right">
        </div>
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
        <?php if(isset($error)):?>
        <div class="alert alert-danger fade in">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <strong>Oppss !</strong> 
          <?php if (isset($error['username'])): ?>
                <div>- <?php echo $error['username']; ?></div>
          <?php endif; ?>
          <?php if (isset($error['email'])): ?>
                <div>- <?php echo $error['email']; ?></div>
          <?php endif; ?>  
        </div>
      <?php endif;?>
      <div class="row">
        <div class="col-sm-9">
          <div class="block-web">
            <div class="header">
              <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
              <h3 class="content-header">User Password</h3>
            </div>
            <div class="form-group">
                  <label>Old Password</label>
                  <input id="password" name="row[password]" type="password"  parsley-minlength="6" class="form-control">
            </div><!--/form-group-->
            <div class="form-group">
                  <label>New Password</label>
                  <input id="password" name="row[password]" type="password"  parsley-minlength="6" class="form-control">
            </div><!--/form-group-->
            <div class="form-group">
                  <label>Re-Type Password</label>
                  <input id="password" name="row[password]" type="password"  parsley-minlength="6" class="form-control">
            </div><!--/form-group-->
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-9">
          <div class="block-web">
            <div class="header">
              <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
              <h3 class="content-header">User Profile</h3>
            </div>
            <div class="porlets-content">
              <form action="#" method="post" parsley-validate novalidate>
                <div class="form-group">
                  <input type="hidden" name="row[id_user]" value="<?php echo $user->id_user;?>">
                  <input type="hidden" name="row[username_user]" value="<?php echo $user->username;?>">
                  <input type="hidden" name="row[email_user]" value="<?php echo $user->email;?>">
                  <label>Username</label>
                  <input type="text" name="row[username]" parsley-trigger="change" required parsley-minlength="5" class="form-control" value="<?php echo $user->username;?>">
                </div><!--/form-group-->
                
                <div class="form-group">
                  <label>Email address</label>
                  <input type="email" name="row[email]" parsley-trigger="change" required class="form-control" value="<?php echo $user->email;?>">
                </div><!--/form-group-->

                

                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="row[name]" parsley-trigger="change" class="form-control" value="<?php echo $user->name;?>">
                </div><!--/form-group-->

                <div class="form-group">
                  <label>Website</label>
                  <input type="url" name="row[website]" parsley-type="url" class="form-control" value="<?php echo $user->website;?>">
                </div><!--/form-group-->

                <div class="form-group">
                  <label>Address</label>
                    <textarea name="row[address]" class="form-control"><?php echo $user->address;?></textarea>
                </div>

                <div class="form-group">
                  <label>Interest</label>
                  <input type="text" name="row[interest]" parsley-trigger="change" class="form-control" value="<?php echo $user->interest;?>">
                </div><!--/form-group-->

                <div class="form-group">
                  <label>About</label>
                    <textarea name="row[about]" class="form-control"><?php echo $user->about;?></textarea>
                </div>

                <div class="form-group">
                  <label>Years Grade</label>
                    <select name="row[years]" class="form-control">
                      <option> 2005 </option>
                      <option> 2006 </option>
                      <option> 2007 </option>
                      <option> 2008 </option>
                      <option> 2009 </option>
                    </select>
                </div><!--/form-group-->

                <!-- <div class="form-group">
                  <label>Status</label>
                    <select name="row[rule_id]" class="form-control">
                      <?php foreach($rules as $rule):?>
                      <option <?php if($rule->id_rule == $user->rule_id): ?> selected="selected" <?php endif;?> value="<?php echo $rule->id_rule;?>"><?php echo $rule->rule;?></option>
                      <?php endforeach;?>
                    </select>
                </div><!--/form-group-->

                <div class="form-group">
                  <label>Picture</label>
                    <input type="file" name="row[img]" class="form-control">
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