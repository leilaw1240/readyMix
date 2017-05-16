<div class="">
    <div class="page-title">

    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add <?php echo ucfirst(Yii::app()->controller->id); ?></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php if (!empty($model->errorMessage)) { ?>
                        <code><?php echo $model->errorMessage; ?></p></code>
                    <?php } ?>
                    <form method="POST" class="form-horizontal form-label-left" id="change_password_form">

<!--                        <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>                        </p>
                        <span class="section">Personal Info</span>-->

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="old_password">Old Password<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="old_password" class="form-control col-md-7 col-xs-12"  name="old_password" placeholder="Old Password" required="required" type="password" value="<?php echo!empty($model->password) ? $model->password : ''; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_password">New Password<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="new_password" class="form-control col-md-7 col-xs-12"  name="new_password" placeholder="New Password" required="required" type="password" value="<?php echo!empty($model->new_password) ? $model->new_password : ''; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="conf_password">Config New Password<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="conf_password" class="form-control col-md-7 col-xs-12" name="conf_password" placeholder="Config Password" required="required" type="password" value="<?php echo!empty($model->password) ? $model->password : ''; ?>">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button onclick="window.history.back();" type="submit" class="btn btn-primary">Cancel</button>
                                <button id="send" type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>