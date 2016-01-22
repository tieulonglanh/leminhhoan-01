<?php 
class Product extends AppModel
{
	public $name = "Product";
	
	public $actsAs = array('Tree');
	
	public $belongsTo = array(
			'ProductCategory'=>array(
				'className'=>'ProductCategory',	
				'foreignKey'=>'product_category_id'
			)
		);
	
	public $validate = array(
        'name' => array( array(
					'rule' => array('notBlank'),
					'message' => 'Tên không được để trống',
					'allowEmpty' => false
				)
		),
        'code' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Mã hàng không được để trống',
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
		),
		'price' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => 'Giá sản phẩm không được để trống và phải là số',
					'allowEmpty' => false
				)
		),
        'sl' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Số lượng không được để trống và phải là số',
                'allowEmpty' => false
            )
		)
    );
}
?>