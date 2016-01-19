<?php
class Order extends AppModel
{
    public $name = "Order";

    public $belongsTo = array(
        'User'=>array(
            'className'=>'User',
            'foreignKey'=>'user_id'
        )
    );


    public function check_order_by_user($order_id, $user_id)
    {
        return $this->find(
            'first', array(
                'conditions' => array(
                    'Order.id' => $order_id,
                    'Order.user_id' => $user_id
                )
            )
        );
    }

}
?>