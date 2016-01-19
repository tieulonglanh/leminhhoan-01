<?php 
class Content extends AppModel
{
	public $name = "Content";
	
	public $actsAs = array('Tree');
	
	public $belongsTo = array(
			'ContentCategory'=>array(
				'className'=>'ContentCategory',	
				'foreignKey'=>'content_category_id'
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
		),
		'sort_order' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => 'Thứ tự sắp xếp không được để trống và phải là số',
					'allowEmpty' => false
				)
		)
    );
}
?>