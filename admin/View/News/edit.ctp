<section class="content-header">
    <h1>
        Danh sách tin tức
        <small>Sửa đổi</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo DOMAINAD ?>" ><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="<?php echo DOMAINAD ?>news" > Danh mục tin tức</a></li>
        <li class="active"> Sửa đổi</li>
    </ol>
</section>

<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'news/edit', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'image')); ?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- header -->
            <div class="box-header">
                <div class="box-tools">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="btn btn-sm btn-success"><i class="fa fa-fw fa-plus-circle"></i> Lưu </a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-success" onclick="javascript:document.image.reset();"><i class="fa fa-fw fa-random"></i> Reset </a>
                            <a href="#messages" rel="modal" class="btn btn-sm btn-success"><i class="fa fa-fw fa-question"></i>Trợ giúp </a>
                            <a href="<?php echo DOMAINAD; ?>news" class="btn btn-sm btn-success"><i class="fa fa-fw fa-times"></i> Hủy </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->

            <div class="box">
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
                        <?php echo $this->Form->input('News.name', array('label' => 'Tiêu đề tin', 'class' => 'form-control', 'onchange' => 'get_alias()', 'id' => 'idtitle')); ?>
                    </div>
                    
                    <div class="form-group">
                        <?php echo $this->Form->input('News.name_en', array('label' => 'SEO Title', 'class' => 'form-control', 'id' => 'name_en')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('News.alias', array('label' => 'Đường dẫn ảo', 'class' => 'form-control', 'id' => 'idalias')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('News.meta_description', array('type' => 'textarea', 'label' => 'Meta description', 'class' => 'form-control', 'style' => 'resize: none;')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('News.meta_keyword', array('label' => 'Meta keyword', 'class' => 'form-control')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('News.news_category_id',array('type'=>'select','options'=>$list_cat,'empty'=>'Chọn danh mục','class'=>'form-control','label'=>'Danh mục'));?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('News.sort_order', array('label' => 'Sắp xếp', 'class' => 'form-control', 'id' => 'idalias')); ?>
                    </div>

                    <div class="form-group">
                        <label>Hình ảnh đại diện:</label>
                        <div id="images_chose">
                            <?php if(!empty($this->data['News']['images'])){?>
                                <img src="/admin/timthumb.php?src=<?php echo $this->data['News']['images'];?>&amp;h=100&amp;w=100&amp;zc=1" />
                            <?php } ?>
                        </div><!--end #images_chose-->
                        <?php echo $this->Form->input('News.images',array('label'=>false, 'class'=>'form-control','id' => 'xFilePath','maxlength'=>'255', 'style' => 'margin-top: 5px; margin-bottom: 5px;'));?>
                        <?php echo $this->Form->input('News.id',array('type'=>'hidden')); ?>
                        <input type="button" value="Chọn ảnh" onclick="BrowseServer();" class="btn btn-primary" style="margin-top: 5px; margin-bottom: 5px;"/>
                    </div>

                    <div class="form-group">
                        <label>Tin trang chủ:</label>
                        <?php
                        echo $this->Form->radio(
                            'News.home_news',
                            array(0=>'Chưa active&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 1=>'Active'),
                            array('legend'=>false, 'style'=>'float: left; cursor: pointer; margin-left: 20px;', 'value'=>1)
                        );
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Tin mới:</label>
                        <?php
                        echo $this->Form->radio(
                            'News.hot_news',
                            array(0=>'Chưa active', 1=>'Active'),
                            array('legend'=>false, 'style'=>'float: left; cursor: pointer; margin-left: 20px;', 'value'=>1)
                        );
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Trạng thái:</label>
                        <?php
                        echo $this->Form->radio(
                            'News.status',
                            array(0=>'Chưa active', 1=>'Active'),
                            array('legend'=>false, 'style'=>'float: left; cursor: pointer; margin-left: 20px;', 'value'=>1)
                        );
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Mô tả tin:</label>
                        <?php
                        $CKEditor = new CKEditor();
                        $CKEditor->returnOutput = true;
                        $CKEditor->basePath = DOMAINAD . "js/ckeditor/";
                        $CKEditor->config['width'] = '98%';
                        $CKEditor->config['height'] = '200';

                        CKFinder::SetupCKEditor( $CKEditor ) ;

                        $CKEditor->config['toolbar'] = array(
                            array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike' ),
                            array( 'Image', 'Link', 'Unlink', 'Anchor' )
                        );

                        $initialValue = empty($this->data['News']['description']) ? '' : $this->data['News']['description'];
                        echo $CKEditor->editor("data[News][description]", $initialValue, "");
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Chi tiết tin:</label>
                        <?php
                        $CKEditor = new CKEditor();
                        $CKEditor->returnOutput = true;
                        $CKEditor->basePath = DOMAINAD . "js/ckeditor/";
                        $CKEditor->config['width'] = '98%';
                        $CKEditor->config['height'] = '300';

                        CKFinder::SetupCKEditor( $CKEditor ) ;

                        $initialValue = empty($this->data['News']['detail']) ? '' : $this->data['News']['detail'];
                        echo $CKEditor->editor("data[News][detail]", $initialValue, "");
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<?php echo $this->Form->end(); ?>