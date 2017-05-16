<?php $this->renderPartial('//emailtemplate/header',array('title'=>'Contact Information')); ?>
<div>
    <div>Hi <?php echo ucfirst($username); ?>, </div><br>
    <div>Thank you for registering with us.</div>
   <?php if($activate_link){ ?> 
    <div>Please reset the password by clicking below url.</div>
    <div><?php echo $activate_link; ?></div>
   <?php  } ?>
    
    <?php if($password){ ?> 
    <div>
        <p>Below is the password for your account.</p> 
        <p><?php echo $password; ?></p> 
    </div>    
    <?php } ?>
    <br>
    <div>Regards,<br> <?php echo Yii::app()->params['signature'] ?></div>
</div>
<?php $this->renderPartial('//emailtemplate/footer'); ?>