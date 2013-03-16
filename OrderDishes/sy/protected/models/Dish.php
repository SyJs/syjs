<?php

/**
 * This is the model class for table "dish".
 *
 * The followings are the available columns in table 'dish':
 * @property integer $dish_id
 * @property string $dish_name
 * @property integer $dish_price
 * @property integer $dish_score
 * @property string $dish_kind
 * @property integer $dish_reco
 * @property string $dish_img
 * @property string $dish_info
 */
class Dish extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Dish the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dish';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dish_name', 'required'),
			array('dish_price, dish_score, dish_reco', 'numerical', 'integerOnly'=>true),
			array('dish_name, dish_kind', 'length', 'max'=>20),
			array('dish_img', 'length', 'max'=>100),
			array('dish_info', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('dish_id, dish_name, dish_price, dish_score, dish_kind, dish_reco, dish_img, dish_info', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'dish_id' => 'Dish',
			'dish_name' => 'Dish Name',
			'dish_price' => 'Dish Price',
			'dish_score' => 'Dish Score',
			'dish_kind' => 'Dish Kind',
			'dish_reco' => 'Dish Reco',
			'dish_img' => 'Dish Img',
			'dish_info' => 'Dish Info',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('dish_id',$this->dish_id);
		$criteria->compare('dish_name',$this->dish_name,true);
		$criteria->compare('dish_price',$this->dish_price);
		$criteria->compare('dish_score',$this->dish_score);
		$criteria->compare('dish_kind',$this->dish_kind,true);
		$criteria->compare('dish_reco',$this->dish_reco);
		$criteria->compare('dish_img',$this->dish_img,true);
		$criteria->compare('dish_info',$this->dish_info,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}