<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to 'column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = 'column1';
    public $db;
    public $payment_types = array(1 => 'Spot Payment', 2 => 'Credit Payment');
    public $payment_modes = array(1 => 'Cheque', 2 => 'Cash');
    
    public $note_types = array(1 => 'Text', 2 => 'Document',3=>'Document with Text');

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    public $uploads = array('proof' => 'client/proof','schedule'=>'schedule/quality');
    public $activity_status = array('create' => 1, 'update' => 2, 'delete' => 3, 'add' => 4, 'edit' => 5, 'trash' => 6);

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
        $id = strtolower($id);
    }

    public function sendMail($from, $to, $subject, $content, $cc = array(), $bcc = array()) {

        Yii::import('application.extensions.phpmailer.JPhpMailer');
        $mail = new JPhpMailer;
        $mail->IsSMTP();

//        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = Yii::app()->params['mailconfig']['host'];
        $mail->Port = Yii::app()->params['mailconfig']['port']; // or 587
        $mail->Username = Yii::app()->params['mailconfig']['username'];
        $mail->Password = Yii::app()->params['mailconfig']['password'];

        $mail->IsHTML(true);
        $mail->SMTPAuth = true;

        $mail->SetFrom($from);
        $mail->Subject = $subject;
//        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
        $mail->MsgHTML($content);
        if ($to) {
            if (is_array($to)) {
                foreach ($to as $t) {
                    $mail->AddAddress($t);
                }
            } else {
                $mail->AddAddress($to);
            }
        }


        if ($cc) {
            
        }
        if ($bcc) {
            
        }

        if ($mail->Send()) {
            return true;
        }
    }

    public function logactivity($msg) {

        $activity_status = array(1 => 'Created', 2 => 'Updated', 3 => 'Deleted', 4 => 'Added', 5 => 'Edited', 6 => 'Deleted');
        $message = $activity_status[$msg['activity_type']] . ' Successfully';
        if ($msg['module_info']) {
            $message = ucfirst($msg['module_info']->lookup_value) . ' ' . $activity_status[$msg['activity_type']] . ' Successfully';
        }
        $this->setMessage('success', $message);
        $new_activity = new SystemLog();
        $new_activity->source_id = $msg['source_id'];
        $new_activity->module_id = $msg['module_info']->id;
        $new_activity->activity_type = $msg['activity_type'];
        $new_activity->ip_address = $this->getRealUserIp();
        $new_activity->user_agent = $_SERVER['HTTP_USER_AGENT'];
        $new_activity->created_by = Yii::app()->session['userdata']['user_id'];
        $new_activity->created_date = date('Y-m-d H:i:s');
        $new_activity->save(false);
    }

    function getRealUserIp() {
        switch (true) {
            case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            default : return $_SERVER['REMOTE_ADDR'];
        }
    }

            

    public function setMessage($type, $message) {
        Yii::app()->user->setFlash('type', $type);
        Yii::app()->user->setFlash('message', $message);
    }

    public static function getProfile($file) {

        $p_img = Yii::app()->request->baseUrl . '/uploads/user/profile/no_profile_image.png';
        if (!empty($file)) {
            $p_img = Yii::app()->request->baseUrl . '/uploads/user/profile/' . $file;
        }
        return $p_img;
    }

    public function getModuleid($controller) {
        $info = LookUp::model()->findByAttributes(array('lookup_value' => $controller));
        if ($info) {
            return $info;
        }
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return strtoupper($randomString);
    }

    public function is_admin_logged() {
        if (empty(Yii::app()->session['userdata']['user_id'])) {
            $this->redirect($this->createUrl('admin/index'));
        }
    }

    public function is_user_logged() {
        if (empty(Yii::app()->session['login']['user_id'])) {
            $this->redirect($this->createUrl('site/index'));
        }
    }

    public function UpdateNotification($id) {
        if ($id) {
            $check = SystemLog::model()->findByPk($id);
            if ($check) {
                $check->status = 1;
                $check->save();
                return true;
            }
        }
    }

    public function createThumbnail($filepath, $thumbpath, $thumbnail_width, $thumbnail_height, $background = false) {

        list($original_width, $original_height, $original_type) = getimagesize($filepath);
        if ($original_width > $original_height) {
            $new_width = $thumbnail_width;
            $new_height = intval($original_height * $new_width / $original_width);
        } else {
            $new_height = $thumbnail_height;
            $new_width = intval($original_width * $new_height / $original_height);
        }
        $dest_x = intval(($thumbnail_width - $new_width) / 2);
        $dest_y = intval(($thumbnail_height - $new_height) / 2);

        if ($original_type === 1) {
            $imgt = "ImageGIF";
            $imgcreatefrom = "ImageCreateFromGIF";
        } else if ($original_type === 2) {
            $imgt = "ImageJPEG";
            $imgcreatefrom = "ImageCreateFromJPEG";
        } else if ($original_type === 3) {
            $imgt = "ImagePNG";
            $imgcreatefrom = "ImageCreateFromPNG";
        } else {
            return false;
        }

        $old_image = $imgcreatefrom($filepath);
        $new_image = imagecreatetruecolor($thumbnail_width, $thumbnail_height); // creates new image, but with a black background
        // figuring out the color for the background
        if (is_array($background) && count($background) === 3) {
            list($red, $green, $blue) = $background;
            $color = imagecolorallocate($new_image, $red, $green, $blue);
            imagefill($new_image, 0, 0, $color);
            // apply transparent background only if is a png image
        } else if ($background === 'transparent' && $original_type === 3) {
            imagesavealpha($new_image, TRUE);
            $color = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
            imagefill($new_image, 0, 0, $color);
        }
        imagecopyresampled($new_image, $old_image, $dest_x, $dest_y, 0, 0, $new_width, $new_height, $original_width, $original_height);
        $imgt($new_image, $thumbpath);
        return file_exists($thumbpath);
    }

    public function getFilePath($file_type, $file_name) {
        return Yii::app()->request->baseUrl . '/uploads/' . $this->uploads[$file_type] . '/' . $file_name;
    }

    public static function time_elapsed_string($ptime) {
        $etime = time() - $ptime;

        if ($etime < 1) {
            return '0 seconds';
        }

        $a = array(365 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60 => 'month',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hour',
            60 => 'minute',
            1 => 'second'
        );
        $a_plural = array('year' => 'years',
            'month' => 'months',
            'day' => 'days',
            'hour' => 'hours',
            'minute' => 'minutes',
            'second' => 'seconds'
        );

        foreach ($a as $secs => $str) {
            $d = $etime / $secs;
            if ($d >= 1) {
                $r = round($d);
                return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
            }
        }
    }
    
    function UploadImage($source_file,$target_file) {
        
        $key = array_keys($source_file); 
        $key = $key[0];
        $file_ext = explode('.', $source_file[$key]['name']);
        $imageFileType = end($file_ext);
        $file_name = time().'.'.$imageFileType;
 
        $target_file = Yii::app()->basePath.'/../uploads/'.$target_file.'/'.$file_name; 
        $success = 1;
        if ($imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $message = "Sorry, only PDF, JPG, JPEG, PNG & GIF files are allowed.";
            $success = 0;
        }
         if ($success == 0) {
            $message =  "Sorry, your file was not uploaded.";
         } else {
            if (move_uploaded_file($source_file[$key]["tmp_name"], $target_file)) {
                $message = "The file " . basename($source_file[$key]['name']) . " has been uploaded.";
            } else {
                $message =  "Sorry, there was an error uploading your file.";
            }
        }
        return array('success'=>$success,'file_name'=>$file_name);
    }

}
