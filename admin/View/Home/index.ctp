<?php echo $this->Html->css("layout2");?>
<link id="dynamic_color" rel="stylesheet" href="http://3darcshop.com/arcadm/view/stylesheet/blue.css" type="text/css" media="screen">
<section class="content-header">
    <h1>
       Bảng Quản Trị
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo DOMAINAD ?>" ><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<?php
                    $my_error1 = $this->Session->flash();
                    ?>
                    <?php if($my_error1){ ?>
                        <div class="alert alert-success alert-dismissable">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $my_error1; ?>
                        </div>
                    <?php } ?>
<!--<div class="col-md-6">
    <div class="overview">
        <div class="dashboard-heading">Tổng quan</div>
        <div class="dashboard-content">
            <style>
                table tr td{padding:4px 0;}
            </style>
            <table>
                <tbody><tr class="alt-row">
                    <td>Tổng số bán hàng:</td>
                    <td>€<?php echo number_format($order_total)?></td>
                </tr>
                <tr>
                    <td>Tổng số bán hàng trong năm:</td>
                    <td>€<?php echo number_format($order_total_year)?></td>
                </tr>
                <tr>
                    <td>Tổng số bán hàng trong tháng:</td>
                    <td>€<?php echo number_format($order_total_month)?></td>
                </tr>
                <tr class="alt-row">
                    <td>Tổng số đơn đặt hàng:</td>
                    <td><?php echo $order_count?></td>
                </tr>
                <tr>
                    <td>Tổng số đơn đặt hàng thành công:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo $order_success_count?></td>
                </tr>
                <tr>
                    <td>Tổng số đơn đặt hàng trong ngày:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo $order_date_count?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-md-12" style="margin-top: 10px;">
    <div class="latest">
        <div class="dashboard-heading">10 đơn đặt hàng mới nhất</div>
        <div class="dashboard-content">
            <table class="table table-hover table-bordered" width="100%">
                <thead>
                <tr>
                    <th width="10%" style="text-align: left;">Mã đơn hàng</th>
                    <th width="15%" style="text-align: left">Trạng thái</th>
                    <th width="22%" style="text-align: left;">Tên khách hàng</th>
                    <th width="11%">Ngày mua</th>
                    <th width="20%">Tổng tiền</th>
                    <th width="20%">Hành động</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($Order as $key => $value) {?>
                    <tr>
                        <td style="text-align: left;">
                            <a href="<?php echo DOMAINAD ?>order/detail/<?php echo $value['Order']['id']; ?>"><?php echo $value['Order']['id']?> <?php if(date('Y-m-d', strtotime($value['Order']['modified'])) == date('Y-m-d')) { ?><img src="<?php echo DOMAINAD ?>images/icons/iconnew.gif" alt="New" /><?php } ?></a>
                        </td>
                        <td style="text-align: left">
                            <?php echo $value['Order']['payment_status'] == '1' ? '<span class="label label-success">Success</span>' : ($value['Order']['payment_status'] == '0' ? '<span class="label label-warning">Pedding</span>' : '<span class="label label-danger">Fail</span>'); ?>
                        </td>
                        <td style="text-align: left;">
                            <?php echo $value['User']['fullname']; ?>
                        </td>
                        <td>
                            <?php echo date('d-m-Y', strtotime($value['Order']['created'])); ?>
                        </td>
                        <td><?php echo number_format($value['Order']['total_amount']); ?></td>
                        <td>
                            [<a href="<?php echo DOMAINAD ?>order/detail/<?php echo $value['Order']['id']; ?>" title="Edit">Xem</a>]
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

-->



















</section><!-- /.content -->