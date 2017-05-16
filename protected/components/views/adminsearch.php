<?php $module = Yii::app()->controller->id;
if ($module == 'listing') {
    ?> 
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <form method="POST" class="form-horizontal form-label-left" id="common_validation" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="text" name="title" value="<?php echo $model->title ? $model->title : '' ?>" class="form-control" id="name" placeholder="Listing Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" name="category_id" id="category_id">
                                    <option value="">Category</option>
                                    <?php if (!empty($categories)) {
                                        foreach ($categories as $category) {
                                            ?> 
                                            <option <?php echo $model->category_id == $category->id ? 'selected="selected"' : '' ?> value="<?php echo $category->id; ?>" ><?php echo $category->category_name; ?></option>
        <?php }
    }
    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="is_featured" class="form-control" id="is_featured">
                                    <option <?php echo $model->is_featured == 0 ? 'selected="selected"' : '' ?> value="0">Non Sponsored</option> 
                                    <option <?php echo $model->is_featured == 1 ? 'selected="selected"' : '' ?> value="1">Sponsored</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <!--<label for="name" class="col-sm-2 control-label">Name</label>-->
                                <div class="col-sm-10">
                                    <input type="text" name="id" value="<?php echo $model->id ? $model->id : '' ?>" class="form-control" placeholder="List Id">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <!--<label for="name" class="col-sm-2 control-label">Name</label>-->
                                <div class="col-sm-10">
                                    <select class="form-control" name="city" id="city">
                                        <option value="">City</option>
                                        <?php
                                        if (!empty($cities)) {
                                            foreach ($cities as $city) {
                                                ?> 
                                                <option <?php echo $city->city == $model->city ? 'selected="selected"' : '' ?> value="<?php echo $city->city; ?>" ><?php echo $city->city; ?></option>
        <?php
        }
    }
    ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <select class="form-control" name="status" id="status">
                                        <option value="">All</option>
                                        <option <?php echo ($model->status != '' && $model->status == 0) ? 'selected="selected"' : '' ?> value="0">InActive</option>
                                        <option <?php echo $model->status == 1 ? 'selected="selected"' : '' ?> value="1">Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <!--<button type="submit" class="btn btn-primary">Search</button>-->
                                    <input type="submit" class="btn btn-primary" value="Search"> 
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php } else if ($module == 'user') { ?> 
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <form method="POST" class="form-horizontal form-label-left" id="common_validation" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="text" name="first_name" value="<?php echo!empty($model->first_name) ? $model->first_name : ''; ?>"  class="form-control" id="first_name" placeholder="User Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" name="role_id" id="role_id">
                                    <option value="">Role</option>
    <?php if (!empty($roles)) {
        foreach ($roles as $role) { ?> 
                                            <option <?php echo ($model->role_id == $role->id) ? 'selected="selected"' : ''; ?>  value="<?php echo $role->id; ?>"><?php echo $role->role_name; ?></option>
        <?php }
    } ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="status" class="form-control" id="status">
                                    <option value="">All</option>
                                    <option <?php echo ($model->status != '' && $model->status == 0) ? 'selected="selected"' : '' ?> value="0">InActive</option>
                                    <option <?php echo $model->status == 1 ? 'selected="selected"' : '' ?> value="1">Active</option>                                
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <!--<button type="submit" class="btn btn-primary">Search</button>-->
                                    <input type="submit" class="btn btn-primary" value="Search"> 
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php } else if ($module == 'banner') { ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <form method="POST" class="form-horizontal form-label-left" id="common_validation" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="text" name="title"  class="form-control" id="name" placeholder="Banner Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" name="category_id" id="category_id">
                                    <option value="">Category</option>
    <?php if (!empty($categories)) {
        foreach ($categories as $category) {
            ?> 
                                            <option <?php echo $model->category_id == $category->id ? 'selected="selected"' : '' ?> value="<?php echo $category->id; ?>" ><?php echo $category->category_name; ?></option>
        <?php }
    }
    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="status" class="form-control" id="status">
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <!--<button type="submit" class="btn btn-primary">Search</button>-->
                                    <input type="submit" class="btn btn-primary" value="Search"> 
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php } ?>

