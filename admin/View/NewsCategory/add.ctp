<section class="content-header">
    <h1>
        Danh sách tin tức
        <small>Thêm mới</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo DOMAINAD ?>" ><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="<?php echo DOMAINAD ?>news_category" > Tin tức</a></li>
        <li class="active"> Thêm mới</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- box-header -->
            <?php echo $this->Form->create(null, array('url' => DOMAINAD . 'news_category/add', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'image')); ?>
            <div class="box-header">
                <div class="box-tools" style="margin-bottom: 10px">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="btn btn-success"><i class="fa fa-fw fa-plus-circle"></i> Lưu</a>
                            <a href="javascript:void(0);" onclick="javascript:document.image.reset();" class="btn btn-success"><i class="fa fa-fw fa-random"></i> Reset</a>
                            <a href="#messages" rel="modal" class="btn btn-success"><i class="fa fa-fw fa-question"></i>Trợ giúp </a>
                            <a href="<?php echo DOMAINAD; ?>news_category" class="btn btn-success"><i class="fa fa-fw fa-times"></i> Hủy</a>
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
                        <?php echo $this->Form->input('NewsCategory.parent_id',array('type'=>'select','options'=>$list_cat,'empty'=>'Chọn danh mục','class'=>'form-control','label'=>''));?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('NewsCategory.sort_order', array('label' => 'Sắp xếp', 'class' => 'form-control')); ?>
                    </div>

                    <div class="form-group">
                        <label>Hình ảnh đại diện</label>
                        <div id="images_chose">
                            <?php if(!empty($this->data['NewsCategory']['images'])){?>
                                <img src="/admin/timthumb.php?src=<?php echo $this->data['NewsCategory']['images'];?>&amp;h=100&amp;w=100&amp;zc=1" />
                            <?php } ?>
                        </div><!--end #images_chose-->
                        <?php echo $this->Form->input('NewsCategory.images',array('label'=>false, 'class'=>'form-control','id' => 'xFilePath','maxlength'=>'255', 'style'=>'margin-top: 5px; margin-bottom:5px'));?>
                        <input type="button" value="Chọn ảnh" onclick="BrowseServer();" class="btn btn-primary"/>
                    </div>

                    <div class="form-group">
                        <label>Trạng thái:</label>
                        <?php
                        echo $this->Form->radio(
                            'NewsCategory.status',
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