<?php

/**
 * This is the model class for table "{{plants}}".
 *
 * The followings are the available columns in table '{{plants}}':
 * @property integer $id
 * @property string $plant_name
 * @property integer $supervisor_id
 * @property string $address_1
 * @property string $address_2
 * @property string $mobile_1
 * @property string $mobile_2
 * @property integer $status
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * The followings are the available model relations:
 * @property Users $supervisor
 * @property Schedules[] $schedules
 */
class Plants extends CActiveRecord
{
    public $first_name;
    public $last_name;
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{plants}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('supervisor_id, status, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('plant_name', 'length', 'max'=>60),
			array('address_1, address_2', 'length', 'max'=>150),
			array('mobile_1, mobile_2', 'length', 'max'=>45),
			array('created_date, updated_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, plant_name, supervisor_id, address_1, address_2, mobile_1, mobile_2, status, created_by, created_date, updated_by, updated_date', 'safe', 'on'=>'search'),
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
			'supervisor' => array(self::BELONGS_TO, 'Users', 'supervisor_id'),
			'schedules' => array(self::HAS_MANY, 'Schedules', 'plant_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'plant_name' => 'Plant Name',
			'supervisor_id' => 'Supervisor',
			'address_1' => 'Address 1',
			'address_2' => 'Address 2',
			'mobile_1' => 'Mobile 1',
			'mobile_2' => 'Mobile 2',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('plant_name',$this->plant_name,true);
		$criteria->compare('supervisor_id',$this->supervisor_id);
		$criteria->compare('address_1',$this->address_1,true);
		$criteria->compare('address_2',$this->address_2,true);
		$criteria->compare('mobile_1',$this->mobile_1,true);
		$criteria->compare('mobile_2',$this->mobile_2,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('updated_by',$this->updated_by);
		$criteria->compare('updated_date',$this->updated_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Plants the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
