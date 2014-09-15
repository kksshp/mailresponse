<?php

/**
 * This is the model class for table "mail_responses".
 *
 * The followings are the available columns in table 'mail_responses':
 * @property integer $id
 * @property string $mail_type
 * @property string $description
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property string $variables
 * @property integer $status
 */
class MailResponses extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mail_responses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, subject, message, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('mail_type, email, subject', 'length', 'max'=>255),
			array('mail_type, variables, description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, mail_type, description, email, subject, message, variables, status', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'mail_type' => 'Mail Type',
			'description' => 'Description',
			'email' => 'From Email',
			'subject' => 'Subject',
			'message' => 'Message',
			'variables' => 'Variables',
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
		$criteria->compare('mail_type',$this->mail_type,true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('variables',$this->variables,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MailResponses the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
