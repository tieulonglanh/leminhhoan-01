<?php 
class Contact extends AppModel
{
	public $name = "Contact";
	public $validate = array(
        'name' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Không được để trống',
					'allowEmpty' => false
				)
		),
		'email' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Không được để trống',
					'allowEmpty' => false
				)
		),
		'mobile' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Không được để trống',
					'allowEmpty' => false
				)
		),
		'title' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Không được để trống',
					'allowEmpty' => false
				)
		),
		'content' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Không được để trống',
					'allowEmpty' => false
				)
		)
    );
}
?>