<?php

/**
 * This is the model class for table "{{schedules}}".
 *
 * The followings are the available columns in table '{{schedules}}':
 * @property integer $id
 * @property integer $site_id
 * @property integer $supervisor_id
 * @property double $diameter
 * @property string $mix_type
 * @property string $start_date
 * @property string $end_date
 * @property double $estimated_amount
 * @property double $advance_amount
 * @property integer $status
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * The followings are the available model relations:
 * @property ScheduleNotes[] $scheduleNotes
 * @property SchedulePayments[] $schedulePayments
 * @property ScheduleTransportInfo[] $scheduleTransportInfos
 * @property ClientSites $site
 * @property Users $supervisor
 */
class Schedules extends CActiveRecord {

    public $client_name;
    public $identity_proof;
    public $first_name;
    public $last_name;
    public $supervisor_mobile_number;
    public $client_address_1;
    public $client_address_2;
    public $client_mobile_1;
    public $client_mobile_2;
    public $site_name;
    public $site_address_1;
    public $site_address_2;
    public $site_mobile_1;
    public $site_mobile_2;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{schedules}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('site_id, supervisor_id, status, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('diameter, estimated_amount, advance_amount', 'numerical'),
            array('mix_type', 'length', 'max' => 45),
            array('start_date, end_date, created_date, updated_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, site_id, supervisor_id, diameter, mix_type, start_date, end_date, estimated_amount, advance_amount, status, created_by, created_date, updated_by, updated_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'scheduleNotes' => array(self::HAS_MANY, 'ScheduleNotes', 'schedule_id'),
            'schedulePayments' => array(self::HAS_MANY, 'SchedulePayments', 'schedule_id'),
            'scheduleTransportInfos' => array(self::HAS_MANY, 'ScheduleTransportInfo', 'schedule_id'),
            'site' => array(self::BELONGS_TO, 'ClientSites', 'site_id'),
            'supervisor' => array(self::BELONGS_TO, 'Users', 'supervisor_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'site_id' => 'Site',
            'supervisor_id' => 'Supervisor',
            'diameter' => 'Diameter',
            'mix_type' => 'Mix Type',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'estimated_amount' => 'Estimated Amount',
            'advance_amount' => 'Advance Amount',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
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
        $criteria->compare('site_id', $this->site_id);
        $criteria->compare('supervisor_id', $this->supervisor_id);
        $criteria->compare('diameter', $this->diameter);
        $criteria->compare('mix_type', $this->mix_type, true);
        $criteria->compare('start_date', $this->start_date, true);
        $criteria->compare('end_date', $this->end_date, true);
        $criteria->compare('estimated_amount', $this->estimated_amount);
        $criteria->compare('advance_amount', $this->advance_amount);
        $criteria->compare('status', $this->status);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('updated_by', $this->updated_by);
        $criteria->compare('updated_date', $this->updated_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Schedules the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getSchedules($start, $end) {
        
        $role_id =  Yii::app()->session['userdata']['role_id'];  
        $user_id =  Yii::app()->session['userdata']['user_id'];  
  
        $c = new CDbCriteria();
        $c->select = 't.*,t3.client_name';
        $c->join = 'join tbl_client_sites t2 on t2.id = t.site_id and t2.status =1';
        $c->join .= ' join tbl_clients t3 on t3.id = t2.client_id and t3.status = 1';
        $c->condition = 't.start_date >= "' . $start . '" and t.end_date <= "' . $end . '" ';
        
//        if($role_id == 1){
//            $c->addCondition('t.status != 0','AND');
//        }
        if($role_id == 4){ //Supervisor
            $c->join .= ' join tbl_users t4 on t4.id = t.supervisor_id and t4.status = 1';
            $c->addCondition('t.supervisor_id = '.$user_id.' ','AND');
        }
        if($role_id != 1 && $role_id != 3 && $role_id != 6){ //Sales
            if($role_id == 4){
                $c->addCondition('t.created_by = '.$user_id.' ','OR');
            }else{
                $c->addCondition('t.created_by = '.$user_id.' ','AND');
            }
            
        }
//        if($role_id != 1 && $role_id != 4){
//            $c->addCondition('t.status = 1','AND');
//        }
        $c->order = 't.created_date desc';
        return $this->findAll($c);
    }

    public function getScheduleInfo($schedule_id) {
        $c = new CDbCriteria();
        $c->select = 't.*,t3.client_name,t3.identity_proof,t2.site_name,t2.address_1 as site_address_1,t2.address_2 as site_address_2,t2.mobile_1 as site_mobile_1,t2.mobile_2 as site_mobile_2,t3.address_1 as client_address_1,t3.address_2 as client_address_2,t3.mobile_1 as client_mobile_1,t3.mobile_2 as client_mobile_2,t4.first_name,t4.last_name ,t4.mobile_number as supervisor_mobile_number';
        $c->join = 'join tbl_client_sites t2 on t2.id = t.site_id and t2.status =1';
        $c->join .= ' join tbl_clients t3 on t3.id = t2.client_id and t3.status = 1';
        $c->join .= ' join tbl_users t4 on t4.id = t.supervisor_id and t4.status = 1';
        $c->condition = 't.id = '.$schedule_id.'';
        $c->order = 't.created_date desc';
        return $this->findAll($c);
    }

}
