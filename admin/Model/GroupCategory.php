<?php 
class GroupCategory extends AppModel
{
	public $name = "GroupCategory";
	
	public $actsAs = array('Tree');
	
	public $belongsTo = array(
			'Parent'=>array(
				'className'=>'GroupCategory',	
				'foreignKey'=>'parent_id'
			)
		);
	
	public $validate = array(
        'name' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => 'Tên không được để trống',
					'allowEmpty' => false
				)
		),
		'images' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => 'Ảnh không được để trống',
					'allowEmpty' => false
				)
		)
    );
}
?>