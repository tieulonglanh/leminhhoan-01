<?php
echo $this->Html->script('ckeditor/ckeditor');
?>
<section class="content-header">
    <h1>
        Thêm Album

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo DOMAINAD ?>" ><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="<?php echo DOMAINAD ?>product" > Danh sách Album</a></li>
        <li class="active"> Thêm đổi</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">


    <div class="row">
        <div class="col-xs-12">

            <div class="box-header">
                <div class="box-tools">

                    <div class="input-group">

                        <div class="input-group-btn">

                            <a href="<?php echo DOMAINAD; ?>gallery/add" class="btn btn-sm btn-success" ><i class="fa fa-fw fa-plus-square"></i> Thêm mới </a>
                            <a href="#messages" rel="modal" class="btn btn-sm btn-warning" > Trợ giúp </a>
                            <a href="<?php echo DOMAINAD; ?>home" class="btn btn-sm btn-danger" > Đóng </a>
                        </div>
                    </div>

                </div>
            </div><!-- /.box-header -->

            <div class="box">


                <!-- form start -->
                <?php echo $this->Form->create(null, array('url' => DOMAINAD . 'gallery/add', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'image')); ?>


                <?php
                $my_error1 = $this->Session->flash();
                ?>
                <?php if($my_error1 !='<div id="flashMessage" class="message"></div>'){ ?>
                    <div class="alert alert-warning alert-dismissable">
                        <i class="fa fa-warning"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $my_error1; ?>
                    </div>
                <?php } ?>


                <div class="box-body">
                    <div class="form-group">
                        <label for="idtitle">Tên Gallery</label>
                        <?php echo $this->Form->input('Gallery.name', array('label' => '', 'class' => 'form-control', 'onchange' => 'get_alias()', 'id' => 'idtitle')); ?>
                    </div>


                    <div class="box-body">
                        <div class="form-group">
                            <label>Tên tiếng anh</label>
                            <?php echo $this->Form->input('Gallery.name_en', array('label' => '', 'class' => 'form-control')); ?>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <label>Đường dẫn ảo</label>
                                <?php echo $this->Form->input('Gallery.alias', array('label' => '', 'class' => 'form-control')); ?>
                            </div>


                            <div class="form-group">
                                <label for="idalias">Danh mục</label>

                                <?php echo $this->Form->input('Gallery.gallery_category_id',array('type'=>'select','options'=>$list_cat,'empty'=>'Chọn danh mục','class'=>'btn btn-sm btn-default','label'=>''));?>
                            </div>

                            <div class="form-group">
                                <label>Sắp xếp</label>
                                <?php echo $this->Form->input('Gallery.sort_order', array('type' => 'text', 'label' => '', 'class' => 'form-control', 'style' => 'resize: none;')); ?>
                            </div>



                            <div class="form-group">
                                <label>Hình đại diện</label>

                                <div id="images_chose">
                                    <?php if(!empty($this->data['Gallery']['images'])){?>
                                        <img src="/admin/timthumb.php?src=<?php echo $this->data['Gallery']['images'];?>&amp;h=100&amp;w=100&amp;zc=1" />
                                    <?php } ?>
                                </div><!--end #images_chose-->
                                <?php echo $this->Form->input('Gallery.images',array('label'=>false, 'class'=>'form-control','id' => 'xFilePath','maxlength'=>'255'));?>

                                <input type="button" value="Chọn ảnh" onclick="BrowseServer();" class="btn btn-sm btn-default" float: left; margin-top: -5px;"/>


                            </div>

                            <div class="form-group">
                                <label>Danh sách hình ảnh</label>

                                <div class="box_multi_images">
                                    <input type="hidden" id="number_images" value="<?php echo isset($multi_images) ? count($multi_images) : 1; ?>"  />
                                    <?php if(isset($multi_images)){
                                        foreach($multi_images as $key => $val){
                                            ?>
                                            <div id="box_multi_images_<?php echo $key; ?>">
                                                <div id="images_chose_multi_images_<?php echo $key; ?>" style="float: left; width: 100px;">
                                                    <img src="/admin/timthumb.php?src=<?php echo $val;?>&amp;h=100&amp;w=100&amp;zc=1" />
                                                </div><!--end #images_chose-->
                                                <input name="multi_images[]" class="text-input image-input datepicker" id="multi_images_<?php echo $key; ?>" maxlength="255" style="margin-left: 20px; float: left;" type="text" value="<?php echo $val; ?>">
                                                <input type="button" value="Chọn ảnh" onclick="BrowseServerMore('multi_images_<?php echo $key; ?>');" class="button" style="margin-left: 20px; float: left; margin-top: 5px;"/>
                                                <input type="button" value="Xóa ảnh" onclick="CloseImages('box_multi_images_<?php echo $key; ?>');" class="button close_images" style="margin-left: 20px; float: left; margin-top: 5px;" data-image = "box_multi_images_<?php echo $key; ?>" />
                                                <div style="clear: both;"></div>
                                            </div><!--end #box_multi_images_<?php echo $key; ?>-->
                                        <?php }
                                    } ?>

                                </div>



                                <input type="button" value="Thêm ảnh" onclick="MoreImage()" class="btn btn-sm btn-default" style="margin: 20px;"/>
                            </div><!--end .box-multi_images-->

                            <div class="form-group">
                                <label>Trạng thái&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                <?php
                                echo $this->Form->radio(
                                    'Gallery.status',
                                    array(0=>'&nbspNgừng hoạt động&nbsp&nbsp&nbsp&nbsp&nbsp', 1=>'&nbspHoạt động'),
                                    array('legend'=>false, 'style'=>'float: left; cursor: pointer; margin-left: 20px;', 'value'=>1)
                                );
                                ?>
                            </div>



                            <div class="box-footer">
                                <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="btn btn-primary"> <span class="icon-32-save"></span> Lưu </a>
                                <a href="javascript:void(0);" class="btn btn-primary" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Làm mới </a>
                                <a href="#messages" rel="modal" class="btn btn-primary"> <span class="icon-32-help"></span> Trợ giúp </a>
                                <a href="<?php echo DOMAINAD ?>product" class="btn btn-primary"> <span class="icon-32-cancel"></span> Hủy </a>
                            </div>







                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>

</section><!-- /.content -->


<script type="text/javascript" language="javascript">
    function MoreImage(){
        var number_images = $('#number_images').val();
        number_images ++;
        var content = '<div id="box_multi_images_'+number_images+'"><div id="images_chose_multi_images_'+number_images+'" style="float: left; width: 100px;"></div><!--end #images_chose--><input name="multi_images[]" class="text-input image-input datepicker" id="multi_images_'+number_images+'" maxlength="255" style="margin-left: 20px; float: left;" type="text"><input type="button" value="Chọn ảnh" onclick="BrowseServerMore(\'multi_images_'+number_images+'\');" class="button" style="margin-left: 20px; float: left; margin-top: 5px;"><input type="button" value="Xóa ảnh" onclick="CloseImages(\'box_multi_images_'+number_images+'\');" class="button close_images" style="margin-left: 20px; float: left; margin-top: 5px;" data-image="box_multi_images_'+number_images+'"><div style="clear: both;"></div></div>';
        $('.box_multi_images').append(content);
        $('#number_images').val(parseFloat(number_images));

    }

    function CloseImages(DIV){
        $('#'+DIV).html('');
    }
</script>