<?php 
class NewsCategory extends AppModel
{
	public $name = "NewsCategory";
	
	public $actsAs = array('Tree');
	
	public $belongsTo = array(
			'Parent'=>array(
				'className'=>'NewsCategory',	
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