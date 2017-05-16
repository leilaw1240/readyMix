<?php $this->renderPartial('//emailtemplate/header',array('title'=>'Enquiry Information')); ?>
<div>
    <table>
        <tr>
            <td colspan="">Enquiry as below</td>
        </tr>
        <?php foreach($formdata as $k => $v){ ?> 
        <tr>
            <td><?php echo ucfirst($k); ?></td>
            <td><?php echo $v;?></td>
        </tr>
    
        <?php } ?>

    </table>
    <br>
    <div>Regards,<br> <?php echo Yii::app()->params['signature'] ?></div>
</div>
<?php $this->renderPartial('//emailtemplate/footer'); ?>