<section class="content-header">
    <h1>
        Danh mục Group
        <small>Thêm mới</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo DOMAINAD ?>" ><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="<?php echo DOMAINAD ?>Group_category" > Danh mục Group</a></li>
        <li class="active"> Thêm mới</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- box-header -->
            <?php echo $this->Form->create(null, array('url' => DOMAINAD . 'group_category/add', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'image')); ?>
            <div class="box-header">
                <div class="box-tools" style="margin-bottom: 10px">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="btn btn-success"><i class="fa fa-fw fa-plus-circle"></i> Lưu</a>
                            <a href="javascript:void(0);" onclick="javascript:document.image.reset();" class="btn btn-success"><i class="fa fa-fw fa-random"></i> Reset</a>
                            <a href="#messages" rel="modal" class="btn btn-success"><i class="fa fa-fw fa-question"></i>Trợ giúp </a>
                            <a href="<?php echo DOMAINAD; ?>group_category" class="btn btn-success"><i class="fa fa-fw fa-times"></i> Hủy</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->

            <div class="box box-primary">
                <div class="box-body">
                    <?php $error = $this->Session->flash(); ?>
                    <?php if (strlen($error) > 45): ?>
                        <div class="alert alert-warning alert-dismissable">
                            <i class="fa fa-warning"></i>
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <?php echo $this->Form->input('GroupCategory.name', array('label' => 'Tên danh mục Group', 'class' => 'form-control', 'onchange' => 'get_alias()', 'id' => 'idtitle')); ?>
                    </div>
                    
                   
                    <div class="form-group">
                        <?php echo $this->Form->input('GroupCategory.alias', array('label' => 'Link', 'class' => 'form-control', 'id' => 'idalias')); ?>
                    </div>

                   <div class="form-group">
                        <?php echo $this->Form->input('GroupCategory.parent_id',array('type'=>'select','options'=>$list_cat,'empty'=>'Chọn danh mục','class'=>'form-control','label'=>'Danh mục cha'));?>
                    </div> 


                   

                   

                    <div class="form-group">
                        <label>Trạng thái:</label>
                        <?php
                        echo $this->Form->radio(
                            'GroupCategory.status',
                            array(0=>'Chưa active&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 1=>'Active'),
                            array('legend'=>false, 'style'=>'float: left; cursor: pointer; margin-left: 20px;', 'value'=>1)
                        );
                        ?>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</section>