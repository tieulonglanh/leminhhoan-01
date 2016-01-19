<?php 
class OrderDetail extends AppModel
{
	public $name = "OrderDetail";
	
	public $actsAs = array('Tree');
	
	public $belongsTo = array(
			'Order'=>array(
				'className'=>'Order',	
				'foreignKey'=>'order_id'
			),
			'Product'=>array(
				'className'=>'Product',	
				'foreignKey'=>'product_id'
			)
		);
		
}
?>