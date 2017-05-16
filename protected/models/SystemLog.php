<?php

/**
 * This is the model class for table "{{system_log}}".
 *
 * The followings are the available columns in table '{{system_log}}':
 * @property integer $id
 * @property integer $module_id
 * @property integer $activity_type
 * @property string $ip_address
 * @property string $user_agent
 * @property integer $created_by
 * @property string $created_date
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Users $createdBy
 */
class SystemLog extends CActiveRecord
{
    
    public $lookup_value;
    public $first_name;
    public $last_name;
    public $action;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{system_log}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('module_id, activity_type, created_by, status', 'numerical', 'integerOnly'=>true),
			array('ip_address', 'length', 'max'=>100),
			array('user_agent', 'length', 'max'=>150),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, module_id, activity_type, ip_address, user_agent, created_by, created_date, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'createdBy' => array(self::BELONGS_TO, 'Users', 'created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'module_id' => 'Module',
			'activity_type' => 'Activity Type',
			'ip_address' => 'Ip Address',
			'user_agent' => 'User Agent',
			'created_by' => 'Created By',
			'created_date' => 'Created Date',
			'status' => 'Status',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('module_id',$this->module_id);
		$criteria->compare('activity_type',$this->activity_type);
		$criteria->compare('ip_address',$this->ip_address,true);
		$criteria->compare('user_agent',$this->user_agent,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SystemLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
