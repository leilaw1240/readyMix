<?php $this->renderPartial('//emailtemplate/header',array('title'=>'Contact Information')); ?>
<div>
    <table>
        <tr><td colspan="2">Contact Information</td></tr>
        <tr><td>Name</td><td><?php echo $c_name; ?></td></tr>
        <tr><td>Email</td><td><?php echo $c_email; ?></td></tr>
        <tr><td>Website</td><td><?php echo $c_url; ?></td></tr>
        <tr><td>Message</td><td><?php echo $c_message; ?></td></tr>
        <tr><td colspan="2"></td></tr>
    </table>
</div>
<?php $this->renderPartial('//emailtemplate/footer'); ?>