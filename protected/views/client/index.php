
<?php // $this->widget('AdminSearch',array('model'=>$model));     ?>
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
                            <th>Client Name</th>
                            <th>Address</th>
                            <th>Status </th>
                            <th>Created Date </th>
                            <th class=" no-link last"><span class="nobr">Action</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (!empty($clients)) {
                            foreach ($clients as $client) {
                                ?> 
                                <tr class="even pointer">
                                    <td class="a-center ">
                                        <input type="checkbox" class="tableflat">
                                    </td>
                                    <td class=" "><?php echo $client->client_name; ?></td>
                                    <td class=" "><?php echo $client->address_1 . '<br>' . $client->address_2 . '<br>' . $client->mobile_1; ?></td>
                                    <td class=" "><span class="label label-<?php echo $client->status == 1 ? 'success' : 'danger'; ?>"><?php echo $client->status == 1 ? 'Active' : 'In active'; ?></span></td>
                                    <td class=" "><?php echo date('d-m-Y H:i:s', strtotime($client->created_date)); ?></td>
                                    <td class=" last">
                                        <a href="<?php echo $this->createUrl('client/update', array('id' => $client->id)) ?>">Edit</a> 
                                        <!--| <a href="<?php echo $this->createUrl('client/delete', array('id' => $client->id)) ?>">Delete</a>-->
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