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
                    <h2>Add <?php echo ucfirst(Yii::app()->controller->id); ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <!--<li><a class="close-link"><i class="fa fa-close"></i></a></li>-->
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <form method="POST" class="form-horizontal form-label-left" id="common_validation">

<!--                        <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>                        </p>-->
                        <!--<span class="section">Personal Info</span>-->

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vehicle_number">Vehicle number<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="vehicle_number" class="form-control col-md-7 col-xs-12" data-msg="Role Name required" data-validate-length-range="6" data-validate-words="2" name="vehicle_number" placeholder="Vehicle number" required="required" type="text" value="<?php echo $model->vehicle_number ? $model->vehicle_number: '';  ?>">
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