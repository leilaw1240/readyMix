<ul class="nav navbar-nav navbar-right">
    <li class="">
        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo Yii::app()->session['userdata']['profile_pic']; ?>" alt=""><?php echo Yii::app()->session['userdata']['user_name']; ?>                                  <span class=" fa fa-angle-down"></span>
        </a>
        <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
            <li><a href="<?php echo Yii::app()->createUrl('user/changepassword'); ?>">Change Password</a>
            </li>
<!--            <li>
                <a href="javascript:;">
                    <span class="badge bg-red pull-right">50%</span>
                    <span>Settings</span>
                </a>
            </li>
            <li>
                <a href="javascript:;">Help</a>
            </li>-->
            <li><a href="<?php echo Yii::app()->createUrl('dashboard/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
            </li>
        </ul>
    </li>
    <?php /* if(!empty($notifications)){ ?> 
    <li role="presentation" class="dropdown">
        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-green"><?php echo count($notifications); ?></span>
        </a>
        <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu" style="overflow-y: auto; height:300px;">
            <?php foreach($notifications as $notification){ ?> 
                <li>
                    <a href="<?php echo Yii::app()->createUrl($notification->lookup_value.'/index',array('notification_id'=>$notification->id)); ?>">
                    <span class="image">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/backend/images/img.jpg" alt="Profile Image" />
                    </span>
                    <span>
                        <span><?php echo $notification->first_name.' '.$notification->last_name; ?></span>
                        <span class="time"><?php echo Controller::time_elapsed_string(strtotime($notification->created_date)); ?></span>
                    </span>
                    <span class="message">
                       Has <?php echo $notification->action.' '.$notification->lookup_value; ?>
                    </span>
                </a>
            </li>
            <?php } ?>
            
            
            <li>
                <div class="text-center">
                    <a>
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </li>
        </ul>
    </li>
    <?php } */ ?>
</ul>