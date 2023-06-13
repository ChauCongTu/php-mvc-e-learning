<section class="admin mt-3 mb-3">
    <div class="container">
        <h1>Quản lý danh mục diễn đàn</h1>
        <a style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#add" class="btn btn-danger rounded-0"><i class="fa-solid fa-plus"></i> Thêm danh mục</a>
        <div class="text-danger mb-3">
            <?php echo (isset($errors['name']))?$errors['name']:false; ?>
        </div>
        <div class="table-reponsive">
            <table class="table table-bordered">
                <thead class="bg-primary text-white fw-bold text-center">
                    <td></td>
                    <td>Tên danh mục</td>
                    <td>Số bài viết</td>
                    <td>Ngày tạo</td>
                    <td>Thao tác</td>
                </thead>
                <?php
                $index = 0;
                foreach ($categories as $values) {
                    echo '<tr class="text-center">
                            <td>'.++$index.'</td>
                            <td>'.$values['category_name'].'</td>
                            <td>'.count($values['post']).'</td>
                            <td>'.Helpers::displayTime($values['created_at']).'</td>
                            <td>
                                <a class="text-primary" style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#edit_'.$values['category_id'].'"><i class="fa-solid fa-pen"></i> </a> |
                                <a class="text-danger" style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#del_'.$values['category_id'].'"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>';
                    echo '<div class="modal fade" id="edit_'.$values['category_id'].'">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-content">
                                            <form action="" method="post">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Chỉnh sửa danh mục</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                            
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div class="">
                                                        <input type="hidden" name="id" value="'.$values['category_id'].'">
                                                    </div>
                                                    <div class="">
                                                        <input type="text" class="form-control" placeholder="Nhập tên danh mục" name="name" value="'.$values['category_name'].'">
                                                    </div>
                                                </div>
                            
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button name="edit" class="btn btn-danger">Chỉnh sửa</button>
                                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    echo '<div class="modal fade" id="del_'.$values['category_id'].'">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Xóa danh mục</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                        
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="">
                                                    Bạn có chắc muốn xóa danh mục này?
                                                    <p><small>Lưu ý: tất cả bài viết trong danh mục này cũng sẽ bị xóa theo</small></p>
                                                    <input type="hidden" name="id" value="'.$values['category_id'].'">
                                                </div>
                                            </div>
                        
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button name="del" class="btn btn-danger">Xóa</button>
                                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>';
                } 
                ?>
                
            </table>
            <?php 
            echo Helpers::pagination($pagination['total_rows'], $pagination['recordsPerPage'], $pagination['currentPage']);
            ?>
        </div>

    </div>
</section>

<!-- Add category Model -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-content">
                <form action="" method="post">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm danh mục</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="">
                            <input type="text" class="form-control" placeholder="Nhập tên danh mục" name="name">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button name="add" class="btn btn-danger">Thêm</button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>