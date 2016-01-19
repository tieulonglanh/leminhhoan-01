<script type="text/javascript" language="javascript" src="<?php echo DOMAIN; ?>admin/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        $('.check_type_upload').click(function(){
            var ID = $(this).attr('data-value');
            $('.show_upload_type').hide();
            $(ID).show();
        });
        $('.form_upload_video').submit(function(){
            $('.error').html('');
            if($('#param_title').val() == ''){
                $('#param_title').parent().parent().find('.error').html('<span style="color: red;">Tiêu đề không được để trống</span>');
            }else if($('#param_url').val() == '' && $('.upload_file_name').val() == ''){
                $('#param_url').parent().parent().find('.error').html('<span style="color: red;">Bạn phải nhập đường dẫn youtube cho video</span>');
                $('.upload_file_name').parent().parent().find('.error').html('<span style="color: red;">Bạn chưa chọn file để đăng</span>');
            }else if($('.upload_file_name').val() != '' && $('.upload_file_image').val() == ''){
                $('.upload_file_image').parent().parent().find('.error').html('<span style="color: red;">Bạn chưa nhập ảnh đại diện</span>');
            }else if($('#param_cat').val() == ''){
                $('#param_cat').parent().parent().find('.error').html('<span style="color: red;">Bạn chưa chọn thể loại</span>');
            }else if($('#param_description').val() == ''){
                $('#param_description').parent().parent().find('.error').html('<span style="color: red;">Bạn chưa nhập mô tả cho video</span>');
            }else{
                return true;
            }
            return false;
        });


        var config = {
            'toolbar': [
                ['Bold', 'Italic', 'Underline', 'Strike'],
                ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'],
                ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                ['Format', 'Font', 'FontSize']
            ]
        };

        CKEDITOR.replace('content', config);
    });
</script>
<style type="text/css">
    .formRow{
        margin-bottom: 15px;
    }
</style>
<div class="container">
    <div class="info_video " >
        <h2>Đăng video</h2>
        <?php
        echo $this->Form->create('', array('type' => 'file', 'class' => 'form_upload_video'));
        ?>
            <fieldset>
                <div class="widget">
                    <p style="color: red; text-align: center;">
                        <?php if(!empty($error_message)){
                            echo $error_message;
                        } ?>
                    </p>
                    <div class="formRow">
                        <label class="formLeft" for="param_title">Tiêu đề:<span class="req">*</span></label>
                        <div class="formRight">
                            <?php echo $this->Form->input('Video.name', array('label' => false, 'id' => 'param_title', 'class' => 'form-control')); ?>
                            <div name="cat_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="formRow">
                        <label class="formLeft" for="param_title">Kiểu upload:<span class="req">*</span></label>
                        <div class="formRight">
                            <div class="upload_type_box" style="float: left; margin-right: 15px;">
                                <input id="type_upload_1" type="radio" name="upload_type" value="1" checked="checked" class="check_type_upload" data-value="#type_upload_file" />
                                <label for="type_upload_1" style="font-weight: normal; cursor: pointer;">Upload trực tiếp</label>
                            </div>
                            <div class="upload_type_box">
                                <input id="type_upload_2" type="radio" name="upload_type" value="2" class="check_type_upload" data-value="#type_upload_youtube"/>
                                <label for="type_upload_2" style="font-weight: normal; cursor: pointer;">Link youtube</label>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="formRow show_upload_type" id="type_upload_file">
                        <label class="formLeft" for="param_url">Upload file:<span class="req">*</span></label>
                        <div class="formRight">
                            <?php echo $this->Form->file('Video.upload_file', array('label' => false, 'class' => 'upload_file_name form-control')); ?>
                            <div name="cat_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                        <div class="upload_file_avatar" style="margin-top: 15px;">
                            <label class="formLeft" for="param_url">Ảnh đại diện:<span class="req">*</span></label>
                            <div class="formRight">
                                <?php echo $this->Form->file('Video.images', array('label' => false, 'class' => 'upload_file_image form-control')); ?>
                                <div name="cat_error" class="clear error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>

                    <div class="formRow show_upload_type" id="type_upload_youtube" style="display: none;;">
                        <label class="formLeft" for="param_url">Link youtube:<span class="req">*</span></label>
                        <div class="formRight">
                            <?php echo $this->Form->input('Video.link_youtube', array('label' => false, 'id' => 'param_url', 'class' => 'form-control')); ?>
                            <div name="cat_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="formRow">
                        <label class="formLeft" for="param_cat">Thể loại:<span class="req">*</span></label>
                        <div class="formRight">
                            <?php echo $this->Form->select('Video.video_category_id', $list_cat, array('empty'=>'Chọn thể loại', 'id' => 'param_cat', 'label' => false, 'class' => 'form-control')); ?>
                            <div name="cat_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>


                    <div class="formRow">
                        <label class="formLeft" for="param_cat">Mô tả video:<span class="req">*</span></label>
                        <div class="formRight">
                            <?php echo $this->Form->input('Video.description', array('type' => 'textarea', 'id' => 'param_description', 'label' => false, 'class' => 'form-control', 'style' => 'resize: none; height: 60px;')); ?>
                            <div name="cat_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="formRow">
                        <label class="formLeft" for="param_cat">Nội dung video:<span class="req">*</span></label>
                        <div class="formRight">
                            <?php echo $this->Form->input('Video.content', array('type' => 'textarea', 'id' => 'content', 'label' => false, 'class' => 'form-control', 'style' => 'resize: none; height: 60px;')); ?>
                            <div name="cat_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>


                    <div class="clear"></div>
                    <div class="formSubmit" style="margin-top:10px" >
                        <input type="submit" value="Đăng ngay và luôn" class="btn btn-primary" />
                        <input type="reset" value="Bỏ qua" class="btn" />
                    </div>
                    <div class="clear"></div>

                </div>
            </fieldset>
        </form>
    </div>
    <div class="noiquy">
        <h3>Nhớ đọc kĩ trước khi đăng</h3>
        <div class="item"><span>1</span><p>Không đăng bài trùng. Bài đăng rồi nếu đăng lại sẽ bị xóa</p></div>
        <div class="item"><span>2</span><p>Đừng xóa copyright của người khác để tôn trọng tính sáng tạo</p></div>
        <div class="item"><span>3</span><p>Tiêu đề không được phép thô tục gây phản cảm</p></div>
        <div class="item"><span>4</span><p>Không đăng các nổi dung đả kích bôi nhọ người khác</p></div>
        <div class="item"><span>5</span><p>Không đặt tiêu đề câu Like hoặc kêu gọi Like trong bài</p></div>
        <div class="item"><span>6</span><p>Không sử dụng quá nhiều emotion(mặt cười) khi đặt tiêu đề</p></div>
        <div class="item"><span>7</span><p>Không đăng bài trái với thuần phong mỹ tục, văn hóa dân tộc</p></div>
        <div class="item"><span>8</span><p>Không đăng bài liên quan chính trị, tôn giáo, phân biệt vùng miền</p></div>
        <div class="item"><span>9</span><p>Cấm spam link bài của bạn trong phần comment bài của người khác</p></div>
        <div class="item"><span>10</span><p>Đăng bài đồi trụy phản động sẽ bị <b>xóa tài khoản vĩnh viễn</b></p></div>
    </div>

    <!--</div>-->
</div>