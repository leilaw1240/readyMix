
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
                <?php if (Yii::app()->user->hasFlash('message')) { ?>
                     <div class="infoMesage alert alert-success ">
                         <?php echo Yii::app()->user->getFlash('message'); ?> 
                     </div>
                 <?php } ?>
                <table id="example" class="table table-striped responsive-utilities jambo_table">
                    <thead>
                        <tr class="headings">
                            <th>
                                <input type="checkbox" class="tableflat">
                            </th>
                            <th>Name</th>
                            <th>Role </th>
                            <th>Email </th>
                            <th>Status </th>
                            <th>Schedules</th>
                            <th>Created Date </th>
                            <th class=" no-link last"><span class="nobr">Action</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if(!empty($users)){ foreach($users as $user){ ?> 
                        <tr class="even pointer">
                            <td class="a-center ">
                                <input type="checkbox" class="tableflat">
                            </td>
                            <td class=" "><?php echo $user->first_name.' '.$user->last_name; ?></td>
                            <td class=" "><?php echo $user->role_name; ?></td>
                            <td class=" "><?php echo $user->email; ?></td>
                            <td class=" "><span class="label label-<?php echo $user->status == 1 ? 'success':'danger'; ?>"><?php echo $user->status == 1 ? 'Active':'In active'; ?></span></td>
                            <td class=" ">
                                <a href="<?php echo $this->createUrl('schedule/UserSchedules',array('user_id'=>$user->id)); ?>">
                                    <span class="label label-success">
                                        &nbsp;&nbsp;
                                        <?php echo !empty($user->schedule_count) ? $user->schedule_count : 0; ?>
                                        &nbsp;&nbsp;
                                    </span>
                                </a></td>
                            <td class=" "><?php echo date('d-m-Y H:i:s',  strtotime($user->created_date)); ?></td>
                            <td class=" last"><a href="<?php echo $this->createUrl('user/update',array('id'=>$user->id)) ?>">Edit</a> | <a href="<?php echo $this->createUrl('user/delete',array('id'=>$user->id)) ?>">Delete</a>
                            </td>
                        </tr>
                        <?php } }else{ ?> 
                            <tr class="even pointer">
                                <td colspan="8" align="center"  class="a-center "> No Users Found </td>
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