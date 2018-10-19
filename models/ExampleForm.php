<?php

namespace app\models;

use Yii;
use yii\base\Model;



class ExampleForm extends Model
{
	public $name;
	public $email;
	public $text;
	public $check;
	public $status;
	public $status2;
	public $country;
	public $phone;

	const STATUS_NONE		= 0;
	const STATUS_DISABLED	= 1;
	const STATUS_ACTIVE		= 10;
	const STATUS_SUPER		= 11;
	
	

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['name', 'email', 'text', 'phone'], 'required'],
			[['check'], 'boolean'],
			[['status', 'status2'], 'in', 'range' => array_keys(static::statusLabels())],
			[['country'], 'in', 'range' => array_keys(static::countryList())],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels ()
	{
		return [
			'name'		=> 'Name',
			'email'		=> 'Email',
			'text'		=> 'Text',
			'check'		=> 'Checkbox',
			'status'	=> 'Status',
			'status2'	=> 'Status 2',
			'country'	=> 'Country',
			'phone'		=> 'Phone',
		];
	}
	
	public static function statusLabels ()
	{
		return [
			static::STATUS_NONE		=> 'None',
			static::STATUS_ACTIVE	=> 'Active',
			static::STATUS_DISABLED	=> 'Disabled',
			static::STATUS_SUPER	=> 'Super',
		];
	}
	
	public static function countryList ()
	{
		return [
			'eu'	=> 'Europe',
			'us'	=> 'United States',
			'gb'	=> 'Great Britain',
			'ru'	=> 'Russia',
			'ua'	=> 'Ukraine',
			'by'	=> 'Belarus',
			'es'	=> 'Spain',
			'it'	=> 'Italy',
		];
	}

}
