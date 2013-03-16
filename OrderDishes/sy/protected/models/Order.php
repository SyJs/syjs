<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property integer $order_id
 * @property integer $order_table
 * @property integer $order_dish_id
 * @property string $order_dish_state
 * @property integer $order_dish_num
 * @property string $order_insert_time
 * @property integer $order_list_id
 */
class Order extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Order the static model class
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
		return 'order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_table, order_dish_id, order_dish_num, order_insert_time, order_list_id', 'required'),
			array('order_table, order_dish_id, order_dish_num, order_list_id', 'numerical', 'integerOnly'=>true),
			array('order_dish_state', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('order_id, order_table, order_dish_id, order_dish_state, order_dish_num, order_insert_time, order_list_id', 'safe', 'on'=>'search'),
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
			'order_id' => 'Order',
			'order_table' => 'Order Table',
			'order_dish_id' => 'Order Dish',
			'order_dish_state' => 'Order Dish State',
			'order_dish_num' => 'Order Dish Num',
			'order_insert_time' => 'Order Insert Time',
			'order_list_id' => 'Order List',
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

		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('order_table',$this->order_table);
		$criteria->compare('order_dish_id',$this->order_dish_id);
		$criteria->compare('order_dish_state',$this->order_dish_state,true);
		$criteria->compare('order_dish_num',$this->order_dish_num);
		$criteria->compare('order_insert_time',$this->order_insert_time,true);
		$criteria->compare('order_list_id',$this->order_list_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}