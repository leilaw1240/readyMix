<?php

/**
 * This is the model class for table "{{clients}}".
 *
 * The followings are the available columns in table '{{clients}}':
 * @property integer $id
 * @property string $client_name
 * @property string $client_logo
 * @property string $identity_proof
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
 * @property ClientSites[] $clientSites
 */
class Clients extends CActiveRecord {
    
    public $site_id;
    public $site_name;
    public $site_address_1;
    public $site_address_2;
    public $site_mobile_1;
    public $site_mobile_2;


    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{clients}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('status, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('client_name, identity_proof', 'length', 'max' => 60),
            array('client_logo', 'length', 'max' => 100),
            array('address_1, address_2', 'length', 'max' => 150),
            array('mobile_1, mobile_2', 'length', 'max' => 45),
            array('created_date, updated_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, client_name, client_logo, identity_proof, address_1, address_2, mobile_1, mobile_2, status, created_by, created_date, updated_by, updated_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'clientSites' => array(self::HAS_MANY, 'ClientSites', 'client_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'client_name' => 'Client Name',
            'client_logo' => 'Client Logo',
            'identity_proof' => 'Identity Proof',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('client_name', $this->client_name, true);
        $criteria->compare('client_logo', $this->client_logo, true);
        $criteria->compare('identity_proof', $this->identity_proof, true);
        $criteria->compare('address_1', $this->address_1, true);
        $criteria->compare('address_2', $this->address_2, true);
        $criteria->compare('mobile_1', $this->mobile_1, true);
        $criteria->compare('mobile_2', $this->mobile_2, true);
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
     * @return Clients the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getClients($string) {
//        echo $string;exit;
        $c = new CDbCriteria();
        $c->select = 't.*'; //,t1.id as site_id,t1.site_name,t1.address_1 as site_address_1,t1.address_2 as site_address_2,t1.mobile_1 as site_mobile_1,t1.mobile_2 as site_mobile_2
//        $c->join = 'left join tbl_client_sites t1 on t1.client_id = t.id';
        $c->condition = "t.status= 1 and t.client_name  LIKE '%" . $string . "%'";
        return $this->findAll($c);
    }
    
    public function getSites($client_id){
        $c = new CDbCriteria();
        $c->select = 't1.id as site_id,t1.site_name,t1.address_1 as site_address_1,t1.address_2 as site_address_2,t1.mobile_1 as site_mobile_1,t1.mobile_2 as site_mobile_2'; //,
        $c->condition = "t1.status= 1 and t1.client_name  LIKE '%" . $string . "%'";
        return ClientSites::model()->findAll($c);
    }

}
