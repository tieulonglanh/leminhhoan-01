<section class="content-header">
    <h1>Danh sách Content</h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo DOMAINAD ?>" ><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active">Content</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
                <!-- header -->
                <div class="box-header">
                    <div class="box-tools">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <a href="<?php echo DOMAINAD; ?>Content/add" class="btn btn-sm btn-success" ><i class="fa fa-fw fa-plus-circle"></i> Thêm mới </a>
                                <a href="#messages" rel="modal" class="btn btn-sm btn-success" ><i class="fa fa-fw fa-question"></i> Trợ giúp </a>
                                <a href="<?php echo DOMAINAD; ?>home" class="btn btn-sm btn-success" ><i class="fa fa-fw fa-times-circle"></i> Đóng </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /header -->

                <!-- box -->
                <div class="box">
                    <div class="box-body table-responsive">
                        <?php echo $this->Form->create(null, array('url' => DOMAINAD . 'Content/search', 'type' => 'post', 'name' => 'frm_search')); ?>
                        <table class="timkiem">
                            <tr>
                                <td valign="top">Tìm kiếm</td>
                                <td><input type="text" id="field2c" name="keyword" class="text-input" value=""></td>
                                <td><?php echo $this->Form->input('',array('name'=>'category_id', 'type'=>'select','options'=>$list_cat,'empty'=>'Chọn danh mục', 'label'=>'', 'style'=>'width: 200px;'));?></td>
                                <td><input type="submit" name="" value="Tìm kiếm" /></td>
                            </tr>
                        </table>
                        <?php echo $this->Form->end(); ?>

                        <?php echo $this->Form->create(null, array('url' => DOMAINAD . 'Content/action_all', 'type' => 'post', 'name' => 'frm_list')); ?>

                        <?php $error = $this->Session->flash(); ?>
                        <?php if (strlen($error) > 45): ?>
                            <div class="alert alert-warning alert-dismissable">
                                <i class="fa fa-warning"></i>
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th width="2%"><input type="checkbox" name="all" id="checkall" /></th>
                                    <th width="4%">STT</th>
                                    <th width="15%">Ảnh đại diện</th>
                                    <th width="30%" style="text-align:center;"><?php echo $this->Paginator->sort('Content.name', 'Tên'); ?></th>
                                    <th width="15%"><?php echo $this->Paginator->sort('Content.content_category_id', 'Danh mục'); ?></th>
                                    <!-- <th width="11%"><?php echo $this->Paginator->sort('Content.price', 'Giá'); ?></th> -->
                                    <th width="11%"><?php echo $this->Paginator->sort('Content.modified', 'Thay đổi'); ?></th>
                                    <th width="12%">Xử lý</th>
                                    <th width="3%"><?php echo $this->Paginator->sort('Content.id', 'Mã'); ?></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td colspan="9">
                                    <div class="bulk-actions align-left" style="float: left">
                                             <div id="box_action_all">
                                        <select name="process" id="chose_action_all" class="btn btn-sm btn-default" style="text-align: left">
                                            <option value="none">Lựa chọn</option>
                                            <option value="active_all">Active</option>
                                            <option value="close_all">Hủy Active</option>
                                            <option value="delete_all">Delete</option>
                                        </select>
                                        <input type="submit" name="submit_action_all" class="btn btn-sm btn-danger" value="Thực hiện" />
                                    </div><!--end #box_action_all-->
                                </div><!--end #bulk-aciton-->
                                        <div class="pagination" style="float: right; margin-right: 10px;">
                                            <?php
                                            if($this->Paginator->counter('{:pages}')>1){
                                                echo $this->Paginator->first('« Đầu ', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li'));
                                                echo $this->Paginator->prev('« Trước ', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li'));
                                                echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'currentClass' => 'active', 'tag' => 'li', 'first' => 1));
                                                echo $this->Paginator->next(' Tiếp »', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li'));
                                                echo $this->Paginator->last('« Cuối ', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li'));
                                            }
                                            ?>
                                            <script type="text/javascript">
                                                $(function() {
                                                    $(".pagination li").each(function (k, v) {
                                                        if($(this).find("a").length == 0) {
                                                            $(this).html("<a>" + $(this).html() + "</a>");
                                                        }
                                                    });
                                                });
                                            </script>
                                        </div>
                                        <div class="clear"></div>
                                    </td>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($Content as $key => $value) {  ?>
                                <tr>
                                    <td><input type="checkbox" name="chose_active[<?php echo $value['Content']['id']; ?>]" /></td>
                                    <td><?php echo $key+1; ?></td>
                                    <td>
                                        <img src="<?php echo DOMAINAD?>/timthumb.php?src=<?php echo $value['Content']['images'];?>&amp;h=100&amp;w=100&amp;zc=1" />
                                    </td>
                                    <td><a href="<?php echo DOMAINAD ?>Content/edit/<?php echo $value['Content']['id']; ?>" title="Edit"><?php echo $value['Content']['name']; ?></a>  <?php if(date('Y-m-d', strtotime($value['Content']['modified'])) == date('Y-m-d')) { ?><img src="<?php echo DOMAINAD ?>images/icons/iconnew.gif" alt="New" /><?php } ?></td>
                                    <td><?php echo $value['ContentCategory']['name']; ?></td>
                                    <!-- <td><?php echo $value['Content']['price']; ?></td> -->
                                    <td>
                                        <?php echo date('d-m-Y', strtotime($value['Content']['modified'])); ?></td>
                                    <td>
                                        <a href="<?php echo DOMAINAD ?>Content/copy/<?php echo $value['Content']['id']; ?>" title="Copy"><img src="<?php echo DOMAINAD ?>images/icons/copy.png" alt="Copy" /></a>
                                        <a href="<?php echo DOMAINAD ?>Content/edit/<?php echo $value['Content']['id']; ?>" title="Edit"><img src="<?php echo DOMAINAD ?>images/icons/pencil.png" alt="Edit" /></a> <a href="javascript:confirmDelete('<?php echo DOMAINAD ?>Content/delete/<?php echo $value['Content']['id']; ?>')" title="Delete"><img src="<?php echo DOMAINAD ?>images/icons/cross.png" alt="Delete" /></a>
                                        <?php
                                        if ($value['Content']['status'] == 0) {
                                            ?>
                                            <a href="<?php echo DOMAINAD ?>Content/active/<?php echo $value['Content']['id']; ?>" title="Kích hoạt" class="icon-5 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/Play-icon.png" alt="Kích hoạt" /></a>
                                        <?php
                                        } else {
                                            ?>
                                            <a href="<?php echo DOMAINAD ?>Content/close/<?php echo $value['Content']['id']; ?>" title="Đóng" class="icon-4 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/success-icon.png" alt="Ngắt kích hoạt" /></a>
                                        <?php
                                        }
                                        ?></td>
                                    <td align="right"><?php echo $value['Content']['id']; ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /box -->
            </div>
        </div>
    </div>
</section>