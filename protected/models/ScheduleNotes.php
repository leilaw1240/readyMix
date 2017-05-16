<?php

/**
 * This is the model class for table "{{schedule_notes}}".
 *
 * The followings are the available columns in table '{{schedule_notes}}':
 * @property integer $id
 * @property integer $schedule_id
 * @property integer $note_type
 * @property string $file_name
 * @property string $message
 * @property integer $status
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * The followings are the available model relations:
 * @property Schedules $schedule
 */
class ScheduleNotes extends CActiveRecord {

    public $first_name;
    public $last_name;
    public $profile_image;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{schedule_notes}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('schedule_id, note_type, status, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('file_name', 'length', 'max' => 100),
            array('message, created_date, updated_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, schedule_id, note_type, file_name, message, status, created_by, created_date, updated_by, updated_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'schedule' => array(self::BELONGS_TO, 'Schedules', 'schedule_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'schedule_id' => 'Schedule',
            'note_type' => 'Note Type',
            'file_name' => 'File Name',
            'message' => 'Message',
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
        $criteria->compare('schedule_id', $this->schedule_id);
        $criteria->compare('note_type', $this->note_type);
        $criteria->compare('file_name', $this->file_name, true);
        $criteria->compare('message', $this->message, true);
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
     * @return ScheduleNotes the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
