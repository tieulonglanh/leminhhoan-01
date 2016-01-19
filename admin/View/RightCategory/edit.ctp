<section class="content-header">
    <h1>
        Danh sách Right
        <small>Sửa đổi</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo DOMAINAD ?>" ><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="<?php echo DOMAINAD ?>Right_category" > Danh mục Right</a></li>
        <li class="active"> Sửa đổi</li>
    </ol>
</section>

<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'Right_category/edit', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'image')); ?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- header -->
            <div class="box-header">
                <div class="box-tools">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="btn btn-sm btn-success"><i class="fa fa-fw fa-edit"></i> Lưu </a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-success" onclick="javascript:document.image.reset();"><i class="fa fa-fw fa-random"></i> </span> Reset </a>
                            <a href="#messages" rel="modal" class="btn btn-sm btn-success"><i class="fa fa-fw fa-question"></i> Trợ giúp </a>
                            <a href="<?php echo DOMAINAD; ?>Right_category" class="btn btn-sm btn-success"><i class="fa fa-fw fa-times"></i> Hủy </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->

            <div class="box">
                <?php $error = $this->Session->flash(); ?>
                <?php if (strlen($error) > 45): ?>
                    <div class="alert alert-warning alert-dismissable">
                        <i class="fa fa-warning"></i>
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <div class="box-body">
                    <?php echo $this->Form->input('RightCategory.id', array('type' => 'hidden')); ?>
                    <div class="form-group">
                        <?php echo $this->Form->input('RightCategory.name', array('label' => 'Tên danh mục Right', 'class' => 'form-control', 'onchange' => 'get_alias()', 'id' => 'idtitle')); ?>
                    </div>
                    
                   

                    <div class="form-group">
                        <?php echo $this->Form->input('RightCategory.alias', array('label' => 'Link', 'class' => 'form-control', 'id' => 'idalias')); ?>
                    </div>

                   

                   <!--  <div class="form-group">
                        <?php echo $this->Form->input('RightCategory.parent_id',array('type'=>'select','options'=>$list_cat,'empty'=>'Chọn danh mục','class'=>'form-control','label'=>'Danh mục cha'));?>
                    </div> -->

                    <div class="form-group">
                        <label>Trạng thái:</label>
                        <?php
                        echo $this->Form->radio(
                            'RightCategory.status',
                            array(0=>'Chưa active&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 1=>'Active'),
                            array('legend'=>false, 'style'=>'float: left; cursor: pointer; margin-left: 20px;', 'value'=>1)
                        );
                        ?>
                    </div>


                </div>
        </div>
    </div>
</section>
<?php echo $this->Form->end(); ?>