<section class="content-header" xmlns="http://www.w3.org/1999/html">
    <h1>Danh sách danh mục Content</h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo DOMAINAD ?>" ><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active">Content</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box-header">
                <div class="input-group">
                    <div class="input-group-btn">
                        <a href="<?php echo DOMAINAD; ?>Content_category/add" class="btn btn-sm btn-success" ><i class="fa fa-fw fa-plus-circle"></i> Thêm mới </a>
                        <a href="#messages" rel="modal" class="btn btn-sm btn-success" ><i class="fa fa-fw fa-question"></i> Trợ giúp </a>
                        <a href="<?php echo DOMAINAD; ?>home" class="btn btn-sm btn-success"><i class="fa fa-fw fa-times-circle"></i> Đóng </a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->

            <div class="content-box-header">
                <?php echo $this->Form->create(null, array('url' => DOMAINAD . 'Content_category/search', 'type' => 'post', 'name' => 'frm_search')); ?>
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-sm btn-danger pull-left" style="margin-right: 5px"/><i class="fa fa-fw fa-search-plus"></i>Tìm kiếm</button>
                    <input type="text" name="keyword" value="" class="form-control input-sm pull-left" style="width: 250px;" placeholder="Tìm kiếm">
                </div>
                <?php echo $this->Form->end(); ?>
            </div>

            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <?php echo $this->Form->create(null, array('url' => DOMAINAD . 'Content_category/action_all', 'type' => 'post', 'name' => 'frm_list')); ?>

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
                            <!-- <th width="20%">Ảnh đại diện</th> -->
                            <th width="20%" style="text-align:center;"><?php echo $this->Paginator->sort('ContentCategory.name', 'Tên danh mục'); ?></th>
                            <!-- <th width="20%"><?php echo $this->Paginator->sort('ContentCategory.parent_id', 'Danh mục cha'); ?></th> -->
                            <!-- <th width="11%"><?php echo $this->Paginator->sort('ContentCategory.sort_order', 'Sắp xếp'); ?></th> -->
                            <th width="11%"><?php echo $this->Paginator->sort('ContentCategory.modified', 'Thay đổi'); ?></th>
                            <th width="12%">Xử lý</th>
                            <th width="3%"><?php echo $this->Paginator->sort('ContentCategory.id', 'Mã'); ?></th>
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
                        <?php foreach ($Content_category as $key => $value) {  ?>
                            <tr>
                                <td><input type="checkbox" name="chose_active[<?php echo $value['ContentCategory']['id']; ?>]" /></td>
                                <td><?php echo $key+1; ?></td>
                              <!--   <td>
                                    <img src="<?php echo DOMAINAD?>/timthumb.php?src=<?php echo $value['ContentCategory']['images'];?>&amp;h=100&amp;w=100&amp;zc=1" />
                                </td> -->
                                <td><a href="<?php echo DOMAINAD ?>Content_category/edit/<?php echo $value['ContentCategory']['id']; ?>" title="Edit"><?php echo $value['ContentCategory']['name']; ?></a>  <?php if(date('Y-m-d', strtotime($value['ContentCategory']['modified'])) == date('Y-m-d')) { ?><img src="<?php echo DOMAINAD ?>images/icons/iconnew.gif" alt="New" /><?php } ?></td>
                               <!--  <td style="text-align:center;">
                                    <?php echo $value['ContentCategory']['name']; ?>
                                </td> -->
                                <!-- <td style="text-align:center;"><?php echo $value['ContentCategory']['sort_order']; ?></td> -->
                                <td>
                                    <?php echo date('d-m-Y', strtotime($value['ContentCategory']['modified'])); ?></td>
                                <td>
                                    <a href="<?php echo DOMAINAD ?>Content_category/copy/<?php echo $value['ContentCategory']['id']; ?>" title="Copy"><img src="<?php echo DOMAINAD ?>images/icons/copy.png" alt="Copy" /></a>
                                    <a href="<?php echo DOMAINAD ?>Content_category/edit/<?php echo $value['ContentCategory']['id']; ?>" title="Edit"><img src="<?php echo DOMAINAD ?>images/icons/pencil.png" alt="Edit" /></a> <a href="javascript:confirmDelete('<?php echo DOMAINAD ?>Content_category/delete/<?php echo $value['ContentCategory']['id']; ?>')" title="Delete"><img src="<?php echo DOMAINAD ?>images/icons/cross.png" alt="Delete" /></a>
                                    <?php
                                    if ($value['ContentCategory']['status'] == 0) {
                                        ?>
                                        <a href="<?php echo DOMAINAD ?>Content_category/active/<?php echo $value['ContentCategory']['id']; ?>" title="Kích hoạt" class="icon-5 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/Play-icon.png" alt="Kích hoạt" /></a>
                                    <?php
                                    } else {
                                        ?>
                                        <a href="<?php echo DOMAINAD ?>Content_category/close/<?php echo $value['ContentCategory']['id']; ?>" title="Đóng" class="icon-4 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/success-icon.png" alt="Ngắt kích hoạt" /></a>
                                    <?php
                                    }
                                    ?></td>
                                <td align="right"><?php echo $value['ContentCategory']['id']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>