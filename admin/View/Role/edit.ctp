<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'Role/edit', 'type' => 'Role', 'enctype' => 'multipart/form-data', 'name' => 'image')); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>Role" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48--add">
            <h2>Sửa quyền</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box">
    <div class="content-box-header">
        <h3></h3>
        <div class="clear"></div>
    </div>
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
            <table width="100%" class="input">
                <tr>
                    <td colspan="2" class="session_flash"><?php echo $this->Session->flash(); ?></td>
                </tr>
                <tr>
                    <td class="label" width="120">Tên quyền</td>
                    <td>
                        <?php echo $this->Form->input('Role.role_name', array('label' => '', 'class' => 'text-input medium-input', 'onchange' => 'get_alias()', 'id' => 'idtitle')); ?>
                        <?php echo $this->Form->input('Role.id', array('type' => 'hidden')); ?>
                    </td>
                </tr>

                <tr>
                    <td class="label" width="120">Phân quyền</td>
                    <td>
                        <div style="padding-left: 20px; margin-bottom: 15px; border-bottom: solid 1px #ddd;">
                            <input type="checkbox" id="check_all" style="float: left;" />
                            <label for="check_all">Chọn tất cả</label>
                            <div class="clear"></div>
                        </div>

                        <?php
                        $role = json_decode($this->data['Role']['pemission'], 1);
                        if(!empty($list_controller)){ foreach($list_controller as $key => $value){ ?>
                            <div class="phone_manu_box" style="padding-bottom: 10px;margin-bottom: 10px;border-bottom: solid 1px #ddd;">
                                <div class="phone_manu_box_left" style="width: 100%; float: left; margin-bottom: 10px; margin-right: 10px;font-weight: bold;text-transform: uppercase;">
                                    <input type="checkbox" id="check_all_controller_<?php echo $key; ?>" style="float: left;" class="check_all_controller" data-class=".input_check_controller_<?php echo $key; ?>" />
                                    <label for="check_all_controller_<?php echo $key; ?>"><?php echo $key; ?></label>
                                </div><!--end .phone_manu_box_left-->
                                <div class="phone_manu_box_right">
                                    <?php if(!empty($value)){foreach($value as $p_key => $p_value){ ?>
                                        <div class="phone_name" style="float: left; width: 190px;">
                                            <input type="checkbox" <?php if(!empty($role[$key][$p_value])) echo 'checked="checked"'; ?> class="input_check_controller_<?php echo $key; ?>" id="input_checkbox_<?php echo $key; ?>_<?php echo $p_value;?>" name="action[<?php echo $key; ?>][<?php echo $p_value;?>]" style="float: left;" />
                                            <label for="input_checkbox_<?php echo $key; ?>_<?php echo $p_value;?>"><?php echo $p_value; ?></label>
                                            <div class="clear"></div>
                                        </div>
                                    <?php } } ?>
                                </div><!--end .phone_manu_box_right-->
                                <div class="clear"></div>
                            </div>
                        <?php }} ?>
                    </td>
                </tr>


            </table>
            <div class="clear"></div>
        </div>
        <div class="tab-content" id="tab2">
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>Role" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>

<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        $('#check_all').change(function () {
            if($(this).attr("checked")) $('input:checkbox').attr('checked','checked');
            else $('input:checkbox').removeAttr('checked');
        });

        $('.check_all_controller').change(function () {
            var THIS_CLASS = $(this).attr('data-class');
            if($(this).attr("checked")) $(THIS_CLASS).attr('checked','checked');
            else $(THIS_CLASS).removeAttr('checked');
        });

    });
</script>