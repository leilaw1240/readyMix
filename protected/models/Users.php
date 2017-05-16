<?php

/**
 * This is the model class for table "{{users}}".
 *
 * The followings are the available columns in table '{{users}}':
 * @property integer $id
 * @property integer $role_id
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $profile_image
 * @property string $mobile_number
 * @property string $activation_code
 * @property integer $status
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 * @property string $last_login_date
 *
 * The followings are the available model relations:
 * @property Plants[] $plants
 * @property UserRoles $role
 */
class Users extends CActiveRecord {

    public $errorMessage;
    public $role_name;
    public $schedule_count;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{users}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('role_id, status, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('email', 'length', 'max' => 150),
            array('password', 'length', 'max' => 255),
            array('first_name, last_name, activation_code', 'length', 'max' => 45),
            array('profile_image', 'length', 'max' => 60),
            array('mobile_number', 'length', 'max' => 10),
            array('created_date, updated_date, last_login_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, role_id, email, password, first_name, last_name, profile_image, mobile_number, activation_code, status, created_by, created_date, updated_by, updated_date, last_login_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'plants' => array(self::HAS_MANY, 'Plants', 'supervisor_id'),
            'role' => array(self::BELONGS_TO, 'UserRoles', 'role_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'role_id' => 'Role',
            'email' => 'Email',
            'password' => 'Password',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'profile_image' => 'Profile Image',
            'mobile_number' => 'Mobile Number',
            'activation_code' => 'Activation Code',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'last_login_date' => 'Last Login Date',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('role_id', $this->role_id);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('profile_image', $this->profile_image, true);
        $criteria->compare('mobile_number', $this->mobile_number, true);
        $criteria->compare('activation_code', $this->activation_code, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('updated_by', $this->updated_by);
        $criteria->compare('updated_date', $this->updated_date, true);
        $criteria->compare('last_login_date', $this->last_login_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Users the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function login() {
        $condition['email'] = $this->email;
        $condition['password'] = md5($this->password);
        if ($this->role_id) {
            $condition['role_id'] = $this->role_id;
        }

        $check = Users::model()->findByAttributes($condition);
        if ($check) {
//            echo '<pre>';            print_r($check);exit;
            if ($check->status == 1) {

                $img = Yii::app()->request->baseUrl . '/uploads/user/profile/no_profile_image.png';
                if (!empty($check->profile_pic)) {
                    $img = Yii::app()->request->baseUrl . '/uploads/user/profile/' . $check->profile_pic;
                    ;
                }
                $logindata = array('user_id' => $check->id,
                    'email' => $check->email,
                    'role_id' => $check->role_id,
                    'profile_pic' => $img,
                    'first_name' => $check->first_name,
                    'last_name' => $check->last_name,
                    'user_name' => $check->first_name . ' ' . $check->last_name
                );
                Yii::app()->session['userdata'] = $logindata;
                $check->last_login_date = date('Y-m-d H:i:s');
                if ($check->save()) {
                    return true;
                }
            } else {
                if ($check->status == 0) {
                    $this->errorMessage = 'Account is not activated.';
                    return false;
                }else{
                    $this->errorMessage = 'Invalid login credentails';
                    return false;
                }
            }
        } else {
            $this->errorMessage = 'Email / Password Invalid';
            return false;
        }
    }
    
    public function GetSupervisors($string){
        return $this->findAll(array('condition'=>"status= 1 and (email  LIKE '%".$string."%' or first_name  LIKE '%".$string."%' or last_name  LIKE '%".$string."%') and role_id = 4"));
    }

}
