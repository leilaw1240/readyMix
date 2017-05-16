
<?php // $this->widget('AdminSearch',array('model'=>$model));    ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo ucfirst(Yii::app()->controller->id); ?> <small>List</small></h2>                 
                <a href="<?php echo $this->createUrl('' . strtolower(Yii::app()->controller->id) . '/create'); ?>" class="btn btn-success pull-right">Add <?php echo ucfirst(Yii::app()->controller->id); ?></a>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="example" class="table table-striped responsive-utilities jambo_table">
                    <thead>
                        <tr class="headings">
                            <th>
                                <input type="checkbox" class="tableflat">
                            </th>
                            <th>Plant Name</th>
                            <th>Supervisor Name</th>
                            <th>Address</th>
                            <th>Status </th>
                            <th>Created Date </th>
                            <th class=" no-link last"><span class="nobr">Action</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (!empty($plants)) {
                            foreach ($plants as $plant) {
                                ?> 
                                <tr class="even pointer">
                                    <td class="a-center ">
                                        <input type="checkbox" class="tableflat">
                                    </td>
                                    <td class=" "><?php echo $plant->plant_name; ?></td>
                                    <td class=" "><?php echo $plant->first_name . ' ' . $plant->last_name; ?></td>  
                                    <td class=" "><?php echo $plant->address_1.'<br>'.$plant->address_2.'<br>'.$plant->mobile_1; ?></td>
                                    <td class=" "><span class="label label-<?php echo $plant->status == 1 ? 'success' : 'danger'; ?>"><?php echo $plant->status == 1 ? 'Active' : 'In active'; ?></span></td>
                                    <td class=" "><?php echo date('d-m-Y H:i:s', strtotime($plant->created_date)); ?></td>
                                    <td class=" last"><a href="<?php echo $this->createUrl('plant/update', array('id' => $plant->id)) ?>">Edit</a> | <a href="<?php echo $this->createUrl('plant/delete', array('id' => $plant->id)) ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?> 
                            <tr class="even pointer">
                                <td colspan="8" align="center"  class="a-center "> No Plants Found </td>
                            </tr>
<?php } ?>

                    </tbody>

                </table>
                <!--                <div class="btn-group">
                                    <button class="btn btn-info" type="button">1</button>
                                    <button class="btn btn-info active" type="button">2</button>
                                    <button class="btn btn-info" type="button">3</button>
                                    <button class="btn btn-info" type="button">4</button>
                                </div>-->
                <?php
                $this->widget('CLinkPager', array(
                    'pages' => $pages,
                ));
                ?>
            </div>
        </div>
    </div>

    <br />
    <br />
    <br />

</div>