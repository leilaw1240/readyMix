<div class="">
    <div class="page-title">
        <!--        <div class="title_left">
                    <h3>
                        Form Validation
                    </h3>
                </div>-->

        <!--        <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>-->
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo $model->id  ? 'Edit' : 'Add'; ?> <?php echo ucfirst(Yii::app()->controller->id); ?></h2>
                     
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php if(!empty($model->errorMessage)){ ?>
                    <code><?php echo $model->errorMessage; ?></p></code>
                    <?php } ?>
                    <form method="POST" class="form-horizontal form-label-left" id="user_register_form">

<!--                        <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>                        </p>
                        <span class="section">Personal Info</span>-->

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">First Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="first_name" class="form-control col-md-7 col-xs-12" data-msg="Please enter First Name" data-validate-length-range="6" data-validate-words="2" name="first_name" placeholder="First Name" required="required" type="text" value="<?php echo $model->first_name ? $model->first_name: '';  ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Last Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="last_name" class="form-control col-md-7 col-xs-12" data-msg="Please Last Name" data-validate-length-range="6" data-validate-words="2" name="last_name" placeholder="Last Name" required="required" type="text" value="<?php echo $model->last_name ? $model->last_name: '';  ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="email" <?php echo !empty($model->id) ? 'disabled="disabled"' : '';  ?>  class="form-control col-md-7 col-xs-12"   name="email" placeholder="Email" type="text" value="<?php echo $model->email ? $model->email: '';  ?>">
                            </div>
                        </div>
                        
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile_number">Mobile number <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="mobile_number" <?php echo !empty($model->mobile_number) ? 'disabled="disabled"' : '';  ?> maxlength="10"  class="form-control col-md-7 col-xs-12"  data-msg="Mobile number required" data-validate-length-range="10" data-validate-words="2" name="mobile_number" placeholder="Mobile number" required="required" type="text" value="<?php echo $model->mobile_number ? $model->mobile_number: '';  ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role_id">Role<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
<!--                                <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">-->
                                <select name="role_id" data-msg="Please select Role" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="" >Select Role</option>
                                    <?php if($roles){ foreach($roles as $role){?> 
                                    <option <?php echo $model->role_id == $role->id ? 'selected="selected"':''; ?> value="<?php echo $role->id; ?>" ><?php echo $role->role_name; ?></option>
                                    <?php  } }?>
                                </select> 
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
<!--                                <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">-->
                                <select name="status" data-msg="Status Required" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="" >Select Status</option>
                                    <option <?php echo $model->status == 0 ? 'selected="selected"':''; ?> value="0">In Active</option>
                                    <option <?php echo $model->status == 1 ? 'selected="selected"':''; ?> value="1">Active</option>
                                </select> 
                            </div>
                        </div>
                         <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button onclick="window.history.back();" type="submit" class="btn btn-primary">Cancel</button>
                                <button id="send" type="submit" class="btn btn-success"><?php echo $model->id ? 'Update':'Create'; ?></button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>