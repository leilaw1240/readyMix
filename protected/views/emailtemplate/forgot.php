<?php $this->renderPartial('//emailtemplate/header', array('title' => 'ForgotPassword')); ?>


<tr>
    <td valign="top" bgcolor="#000000"   style="padding:8px"><table width="100%" cellspacing="5" cellpadding="0" border="0" bgcolor="#ffffff">
            <tbody>
                <tr>
                    <td style="font-family:Arial;font-size:16px;color:rgb(0,0,0);font-weight:bold">Hello <?php echo $username; ?>,</td>
                </tr>
                <tr>
                    <td height="12" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:rgb(0,0,0);font-weight:normal"></td>
                </tr>
                <tr>
                    <td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:rgb(0,0,0);font-weight:normal"><div align="justify">We have received a <span class="il">forgot</span> Username/<span class="il">password</span> request. <br>
                            <br>
                            <br>
                            You can also reset your <span class="il">password</span> by clicking on 
                            the following URL:<br>
                            <br>
                            <a style="color:rgb(183,8,2);font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold" href="<?php echo $activate_link; ?>" target="_blank"  >Click 
                                Here</a> or copy paste the following link in your 
                            browser:<br>
                            <span style="font-size:10px">
                                <a href="<?php echo $activate_link; ?>" target="_blank"><?php echo $activate_link; ?></a>
                            </span> <br>
                            <br>
                            If you are facing trouble with the link provided 
                            please contact us at <a style="color:rgb(183,8,2);font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold" href="mailto:support@classybook.com" target="_blank">support@classybook.com</a><br>
                        </div></td>
                </tr>
                <tr>
                    <td height="12" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:rgb(0,0,0);font-weight:normal"></td>
                </tr>
                <tr>
                    <td height="12" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:rgb(0,0,0);font-weight:normal">Keep In touch!</td>
                </tr>
                <tr>
                    <td height="12" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:rgb(0,0,0);font-weight:normal"><span style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:rgb(0,0,0)">Support Team | <a href="" style="color:rgb(183,8,2);font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold" target="_blank" >www.ClassyBook.com</a></span></td>
                </tr>
            </tbody>
        </table></td>
</tr>

<?php $this->renderPartial('//emailtemplate/footer'); ?>