
 <?php // $this->widget('AdminSearch',array('model'=>$model)); ?>
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
                                #
                            </th>
                            <th>Cleint Name</th>
                            <th>Site Name</th>
                            <th>Client Mobile Number</th>
                            <th>Site Mobile Number</th>
                            <th>Status </th>
                            <th>Created Date </th>
                            <th class=" no-link last"><span class="nobr">Action</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if(!empty($schedules)){ $i=1; foreach($schedules as $schedule){ ?> 
                        <tr class="even pointer">
                            <td class="a-center ">
                                <?php echo $i; ?>
                            </td>
                            <td class=" "><?php echo $schedule->client_name; ?></td>
                            <td class=" "><?php echo $schedule->site_name; ?></td>
                            <td class=" "><?php echo $schedule->client_mobile_1; ?></td>
                            <td class=" "><?php echo $schedule->site_mobile_1; ?></td>
                            <td class=" "><span class="label" style="background-color: <?php echo $this->colors[$schedule->status]; ?>"><?php echo $this->status[$schedule->status]; ?></span></td>
                            <td class=" "><?php echo date('d-m-Y H:i:s',  strtotime($schedule->created_date)); ?></td>
                            <td class=" last">
                                <a href="<?php echo $this->createUrl('schedule/update',array('schedule_id'=>$schedule->id)) ?>">Edit</a> 
                                <!--|                                 <a href="<?php echo $this->createUrl('user/delete',array('schedule_id'=>$schedule->id)) ?>">Delete</a>-->
                            </td>
                        </tr>
                        <?php } }else{ ?> 
                            <tr class="even pointer">
                                <td colspan="8" align="center" class="a-center "> No Schedule Found </td>
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