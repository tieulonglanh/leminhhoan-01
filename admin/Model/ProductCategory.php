<?php 
class ProductCategory extends AppModel
{
	public $name = "ProductCategory";

	public $actsAs = array('Tree');
	
	public $belongsTo = array(
			'Parent'=>array(
				'className'=>'ProductCategory',	
				'foreignKey'=>'parent_id'
			)
		);
	
	public $validate = array(
        'name' => array(array(
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