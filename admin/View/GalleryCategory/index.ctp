<section class="content-header">
    <h1>
        Danh sách danh mục Album ảnh
    </h1>




    <ol class="breadcrumb">
        <li><a href="<?php echo DOMAINAD ?>" ><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active"> Danh sách danh mục Album ảnh</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">


    <div class="row">
        <div class="col-xs-12">

            <div class="box-header">

                <div class="box-tools">
                    <?php echo $this->Form->create(null, array('url' => DOMAINAD . 'gallery_category/search', 'type' => 'post', 'name' => 'frm_search')); ?>
                    <div class="input-group">

                        <div class="input-group-btn">

                            <a href="<?php echo DOMAINAD; ?>gallery_category/add" class="btn btn-sm btn-success" ><i class="fa fa-fw fa-plus-square"></i> Thêm mới </a>
                            <a href="#messages" rel="modal" class="btn btn-sm btn-warning" > Trợ giúp </a>
                            <a href="<?php echo DOMAINAD; ?>home" class="btn btn-sm btn-danger" > Đóng </a>

                        </div>

                        <input type="text" name="keyword" id="field2c" value="" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                        <div class="input-group-btn">
                            <input type="submit" class="btn btn-sm btn-default" />
                        </div>
                    </div>

                    <?php echo $this->Form->end(); ?>
                </div>
            </div><!-- /.box-header -->

            <div class="box">
                <div class="box-body table-responsive no-padding">


                    <?php echo $this->Form->create(null, array('url' => DOMAINAD . 'gallery_category/action_all', 'type' => 'post', 'name' => 'frm_list')); ?>

                    <?php
                    $my_error1 = $this->Session->flash();
                    ?>
                    <?php if($my_error1){ ?>
                        <div class="alert alert-success alert-dismissable">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $my_error1; ?>
                        </div>
                    <?php } ?>

                    <table class="table table-hover table-bordered">
                        <tbody>

                        <thead>
                        <th width="2%"><input type="checkbox" name="all" id="checkall" /></th>
                        <th width="4%">STT</th>
                        <th width="20%">Ảnh đại diện</th>
                        <th width="20%" style="text-align:center;"><?php echo $this->Paginator->sort('GalleryCategory.name', 'Tên danh mục'); ?></th>
                        <th width="20%"><?php echo $this->Paginator->sort('GalleryCategory.parent_id', 'Danh mục cha'); ?></th>
                        <th width="11%"><?php echo $this->Paginator->sort('GalleryCategory.sort_order', 'Sắp xếp'); ?></th>
                        <th width="11%"><?php echo $this->Paginator->sort('GalleryCategory.modified', 'Thay đổi'); ?></th>
                        <th width="12%">Xử lý</th>
                        <th width="3%"><?php echo $this->Paginator->sort('GalleryCategory.id', 'Mã'); ?></th>
                        </thead>

                        <?php foreach ($gallery_category as $key => $value) {  ?>
                            <tr>
                                <td><input type="checkbox" name="chose_active[<?php echo $value['GalleryCategory']['id']; ?>]" /></td>
                                <td><?php echo $key+1; ?></td>
                                <td>
                                    <img src="<?php echo DOMAINAD?>/timthumb.php?src=<?php echo $value['GalleryCategory']['images'];?>&amp;h=100&amp;w=100&amp;zc=1" />
                                </td>
                                <td><a href="<?php echo DOMAINAD ?>gallery_category/edit/<?php echo $value['GalleryCategory']['id']; ?>" title="Edit"><?php echo $value['GalleryCategory']['name']; ?></a>  <?php if(date('Y-m-d', strtotime($value['GalleryCategory']['modified'])) == date('Y-m-d')) { ?><img src="<?php echo DOMAINAD ?>images/icons/iconnew.gif" alt="New" /><?php } ?></td>
                                <td style="text-align:center;"><?php echo $value['Parent']['name']; ?></td>
                                <td style="text-align:center;"><?php echo $value['GalleryCategory']['sort_order']; ?></td>
                                <td>
                                    <?php echo date('d-m-Y', strtotime($value['GalleryCategory']['modified'])); ?></td>
                                <td>
                                    <a href="<?php echo DOMAINAD ?>gallery_category/copy/<?php echo $value['GalleryCategory']['id']; ?>" title="Copy"><img src="<?php echo DOMAINAD ?>images/icons/copy.png" alt="Copy" /></a>
                                    <a href="<?php echo DOMAINAD ?>gallery_category/edit/<?php echo $value['GalleryCategory']['id']; ?>" title="Edit"><img src="<?php echo DOMAINAD ?>images/icons/pencil.png" alt="Edit" /></a> <a href="javascript:confirmDelete('<?php echo DOMAINAD ?>gallery_category/delete/<?php echo $value['GalleryCategory']['id']; ?>')" title="Delete"><img src="<?php echo DOMAINAD ?>images/icons/cross.png" alt="Delete" /></a>
                                    <?php
                                    if ($value['GalleryCategory']['status'] == 0) {
                                        ?>
                                        <a href="<?php echo DOMAINAD ?>gallery_category/active/<?php echo $value['GalleryCategory']['id']; ?>" title="Kích hoạt" class="icon-5 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/Play-icon.png" alt="Kích hoạt" /></a>
                                    <?php
                                    } else {
                                        ?>
                                        <a href="<?php echo DOMAINAD ?>gallery_category/close/<?php echo $value['GalleryCategory']['id']; ?>" title="Đóng" class="icon-4 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/success-icon.png" alt="Ngắt kích hoạt" /></a>
                                    <?php
                                    }
                                    ?></td>
                                <td align="right"><?php echo $value['GalleryCategory']['id']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="9">

                                <div class="bulk-actions align-left">
                                    <div id="box_action_all" style="float: left; margin-left: 10px;">
                                        <select name="process" id="chose_action_all" class="btn btn-sm btn-default">
                                            <option value="none">Lựa chọn</option>
                                            <option value="active_all">Active</option>
                                            <option value="close_all">Hủy Active</option>
                                            <option value="delete_all">Delete</option>
                                        </select>
                                        <input type="submit" name="submit_action_all" class="btn btn-sm btn-default" value="Thực hiện" />
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
                    </table>

                    <?php echo $this->Form->end(); ?>

                </div><!-- /.box-body -->

            </div><!-- /.box -->
        </div>
    </div>


</section><!-- /.content -->
