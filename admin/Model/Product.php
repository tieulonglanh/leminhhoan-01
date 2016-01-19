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
        'name' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Tên không được để trống',
					'allowEmpty' => false
				)
		),
        'code' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Mã hàng không được để trống',
                'allowEmpty' => false
            )
        ),
		'images' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Ảnh không được để trống',
					'allowEmpty' => false
				)
		),
		'sort_order' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Thứ tự sắp xếp không được để trống và phải là số',
					'allowEmpty' => false
				)
		),
		'price' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Giá sản phẩm không được để trống và phải là số',
					'allowEmpty' => false
				)
		),
        'sl' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Số lượng không được để trống và phải là số',
                'allowEmpty' => false
            )
		)
    );
}
?>