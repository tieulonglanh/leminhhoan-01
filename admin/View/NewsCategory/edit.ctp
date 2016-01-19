<section class="content-header">
    <h1>
        Danh sách tin tức
        <small>Sửa đổi</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo DOMAINAD ?>" ><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="<?php echo DOMAINAD ?>news_category" > Danh mục tin tức</a></li>
        <li class="active"> Sửa đổi</li>
    </ol>
</section>

<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'news_category/edit', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'image')); ?>
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
                            <a href="<?php echo DOMAINAD; ?>news_category" class="btn btn-sm btn-success"><i class="fa fa-fw fa-times"></i> Hủy </a>
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
                    <?php echo $this->Form->input('NewsCategory.id', array('type' => 'hidden')); ?>
                    <div class="form-group">
                        <?php echo $this->Form->input('NewsCategory.name', array('label' => 'Tên danh mục tin tức', 'class' => 'form-control', 'onchange' => 'get_alias()', 'id' => 'idtitle')); ?>
                    </div>
                    
                    <div class="form-group">
                        <?php echo $this->Form->input('NewsCategory.name_en', array('label' => 'SEO Title', 'class' => 'form-control', 'id' => 'name_en')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('NewsCategory.alias', array('label' => 'Đường dẫn ảo', 'class' => 'form-control', 'id' => 'idalias')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('NewsCategory.meta_description', array('type' => 'textarea', 'label' => 'Meta description', 'class' => 'form-control', 'style' => 'resize: none;')); ?>
                    </div>
                    
                    <div class="form-group">
                        <?php echo $this->Form->input('NewsCategory.lft', array('type' => 'textarea', 'label' => 'Footer Text', 'class' => 'form-control', 'style' => 'resize: none;')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('NewsCategory.meta_keyword', array('label' => 'Meta keyword', 'class' => 'form-control')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('NewsCategory.parent_id',array('type'=>'select','options'=>$list_cat,'empty'=>'Chọn danh mục','class'=>'form-control','label'=>'Danh mục cha'));?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('NewsCategory.sort_order', array('label' => 'Sắp xếp', 'class' => 'form-control')); ?>
                    </div>

                    <div class="form-group">

                        <?php echo $this->Form->input('NewsCategory.sort_order', array('label' => 'Sắp xếp', 'class' => 'form-control')); ?>
                    </div>


                </div>
        </div>
    </div>
</section>
<?php echo $this->Form->end(); ?>