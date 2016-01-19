<?php 
class Contact extends AppModel
{
	public $name = "Contact";
	public $validate = array(
        'name' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => 'Không được để trống',
					'allowEmpty' => false
				)
		),
		'email' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => 'Không được để trống',
					'allowEmpty' => false
				)
		),
		'mobile' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => 'Không được để trống',
					'allowEmpty' => false
				)
		),
		'title' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => 'Không được để trống',
					'allowEmpty' => false
				)
		),
		'content' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => 'Không được để trống',
					'allowEmpty' => false
				)
		)
    );
}
?>