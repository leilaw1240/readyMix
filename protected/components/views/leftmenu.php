<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <?php if(!empty($permissions)){ foreach($permissions as $permission){ ?> 
            <li><a href="<?php echo Yii::app()->createUrl(strtolower($permission).'/index'); ?>"><i class="fa fa-home"></i><?php echo ucfirst($permission); ?> Management</a></li>
            <?php } }?>
        </ul>
    </div>

</div>