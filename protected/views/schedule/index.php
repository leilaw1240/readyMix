 <div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo ucfirst(Yii::app()->controller->id); ?> <small>List</small></h2>                 
                <a href="<?php echo $this->createUrl(''.  strtolower(Yii::app()->controller->id).'/create'); ?>" class="btn btn-success pull-right">Add <?php echo ucfirst(Yii::app()->controller->id); ?></a>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div id='calendar'></div>
            </div>
        </div>
    </div>

    <br />
    <br />
    <br />

</div>