<?php $this->renderPartial('//emailtemplate/header',array('title'=>'Claim Information')); ?>
<div>
    <table>
        <tr><td colspan="2">User Information</td></tr>
        <tr><td>Name</td><td><?php echo $username; ?></td></tr>
        <tr><td>Email</td><td><?php echo $email; ?></td></tr>
        <tr><td>PhoneNumber</td><td><?php echo $phone_number; ?></td></tr>
        <tr><td colspan="2"></td></tr>
    </table>
    
    <table>
        <tr><td colspan="2">Listing Information</td></tr>
        <tr><td>List Name</td><td><?php echo $list_name; ?></td></tr>
        <tr><td>List ID</td><td><?php echo $list_id; ?></td></tr>
        <tr><td>City</td><td><?php echo $list_city; ?></td></tr>
        <tr><td colspan="2"></td></tr>
    </table>
</div>
<?php $this->renderPartial('//emailtemplate/footer'); ?>