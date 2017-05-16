<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">

                <h2><?php echo ucfirst(Yii::app()->controller->id); ?> <small>List</small></h2>                 
                <a href="<?php echo $this->createUrl(''.  strtolower(Yii::app()->controller->id).'/create'); ?>" class="btn btn-success pull-right">Add <?php echo ucfirst(Yii::app()->controller->id); ?></a>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="example" class="table table-striped responsive-utilities jambo_table">
                    <thead>
                        <tr class="headings">
                            <th>
                                <input type="checkbox" class="tableflat">
                            </th>
                            <th>Vehicle Number</th>
                            <th>Status</th>
                            <th>Created Date </th>
                            <th class=" no-link last"><span class="nobr">Action</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($vehicles)) {
                            foreach ($vehicles as $vehicle) { ?> 
                                <tr class="even pointer">
                                    <td class="a-center ">
                                        <input type="checkbox" class="tableflat">
                                    </td>
                                    <td class=" "><?php echo $vehicle->vehicle_number; ?></td>
                                    <td class=" "><span class="label label-<?php echo $vehicle->status == 1 ? 'success' : 'danger'; ?>"><?php echo $vehicle->status == 1 ? 'Active' : 'In active'; ?></span></td>
                                    <td class=" "><?php echo date('d-m-Y H:i:s', strtotime($vehicle->created_date)); ?></td>
                                    <td class=" last"><a href="<?php echo $this->createUrl('role/update', array('id' => $vehicle->id)) ?>">Edit</a> | <a href="<?php echo $this->createUrl('role/delete', array('id' => $vehicle->id)) ?>">Delete</a>
                                    </td>
                                </tr>
    <?php }
} else { ?> 
                            <tr class="even pointer">
                                <td colspan="6" align="center"  class="a-center "> No Vehicles Found </td>
                            </tr>
<?php } ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <br />
    <br />
    <br />

</div>