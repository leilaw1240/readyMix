<?php $this->renderPartial('//emailtemplate/header',array('title'=>'Enquiry Information')); ?>
<div>
    <table>
        <tr>
            <td colspan="">Thank you for contacting us.</td>
        </tr>
         <tr>
             <td></td>
         </tr>
    
  
    </table>
    <br>
    <div>Regards,<br> <?php echo Yii::app()->params['signature'] ?></div>
</div>
<?php $this->renderPartial('//emailtemplate/footer'); ?>