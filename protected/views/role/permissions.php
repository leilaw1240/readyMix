<?php $permissions = unserialize($permissions); ?>
<div class="">
    <div class="page-title">
        
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Update <?php echo ucfirst(Yii::app()->controller->id); ?></h2>
                     
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <form method="POST" class="form-horizontal form-label-left" id="common_validation">

                        <?php if(!empty($modules)){ foreach($modules as $module){ ?> 
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" ><?php echo $module->lookup_value; ?>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12" data-msg="Please select Atleast one permission" name="permissions[<?php echo $module->id; ?>]" value="<?php echo $module->lookup_value; ?>" <?php echo in_array( $module->lookup_value , $permissions) ? 'checked="checked"':''; ?>   type="checkbox"  >
                            </div>
                        </div>
                        <?php }} ?>
                        
                         
                         <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button onclick="window.history.back();" type="submit" class="btn btn-primary">Cancel</button>
                                <button id="send" type="submit" class="btn btn-success"><?php echo $model->id ? 'Update':'Update'; ?></button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>