<section class="admin">
    <div class="container mt-3 mb-3">
        <div class="h1">Từ vựng</div>
        <a style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#vocabulary_add" class="btn btn-danger mb-3 btn-sm"><i class="fa-solid fa-plus"></i> Thêm từ vựng</a>
        <div class="table-responsive">
            <table class="table table-bordered align-middle bg-white">
                <thead class="bg-light">
                    <tr class="text-center">
                        <th width="10%">#</th>
                        <th width="20%">Từ</th>
                        <th width="20%">Phát âm</th>
                        <th width="20%">Nghĩa</th>
                        <th width="30%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 0; ?>
                    <?php foreach ($lesson['vocabulary'] as $value) { ?>
                        <tr>
                            <td class="text-center"><?php echo ++$index; ?></td>
                            <td><?php echo $value['word']; ?></td>
                            <td><?php echo $value['spelling']; ?></td>
                            <td><?php echo $value['meaning']; ?></td>
                            <td class="text-center">
                                <a style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#vocabulary_detail_<?php echo $value['vocab_id']; ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i> Xem</a>
                                <a style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#vocabulary_edit_<?php echo $value['vocab_id']; ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-pen"></i> Sửa</a>
                                <a style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#vocabulary_del_<?php echo $value['vocab_id']; ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Xóa</a>
                            </td>
                        </tr>
                        <!-- Detail vocabulary Modal -->
                        <div class="modal fade modal-mv" id="vocabulary_detail_<?php echo $value['vocab_id']; ?>">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Chỉnh sửa từ vựng</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="title" class="h5">Từ tiếng anh: </label>
                                                <div class="text_pane">
                                                    <?php echo $value['word']; ?>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="h5">Phiên âm: </label>
                                                <div class="text_pane">
                                                    <?php echo $value['spelling']; ?>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="h5">Nghĩa: </label>
                                                <div class="text_pane">
                                                    <?php echo $value['meaning']; ?>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="h5">Ví dụ: </label>
                                                <div class="text_pane">
                                                    <?php echo $value['example']; ?>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="h5">Từ đồng nghĩa: </label>
                                                <div class="text_pane">
                                                    <?php echo $value['synonyms']; ?>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="h5">Từ trái nghĩa: </label>
                                                <div class="text_pane">
                                                    <?php echo $value['antonyms']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Grammar Modal -->
                        <div class="modal fade modal-mv" id="vocabulary_edit_<?php echo $value['vocab_id']; ?>">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Chỉnh sửa từ vựng</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="title" class="h5">Từ tiếng anh: </label>
                                                <input type="text" name="word" placeholder="Nhập từ" class="form-control" value="<?php echo $value['word']; ?>" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="h5">Phiên âm: </label>
                                                <input type="text" name="spelling" placeholder="Nhập phiên âm" class="form-control" value="<?php echo $value['spelling']; ?>" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="h5">Nghĩa: </label>
                                                <input type="text" name="meaning" placeholder="Nhập nghĩa" class="form-control" value="<?php echo $value['meaning']; ?>" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="h5">Ví dụ: </label>
                                                <textarea name="example" placeholder="Nhập ví dụ" class="editor form-control"><?php echo $value['example']; ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="h5">Từ đồng nghĩa: </label>
                                                <input type="text" name="synonyms" placeholder="Nhập những từ đồng nghĩa" class="form-control" value="<?php echo $value['synonyms']; ?>" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="h5">Từ trái nghĩa: </label>
                                                <input type="text" name="antonyms" placeholder="Nhập những từ trái nghĩa" class="form-control" value="<?php echo $value['antonyms']; ?>" />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" name="edit_vocab">Cập nhật</button>
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Delete Grammar Modal -->
                        <div class="modal fade" id="vocabulary_del_<?php echo $value['vocab_id']; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Xóa từ vựng</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                Xác nhận xóa?
                                                <input type="hidden" name="id" value="<?php echo $value['vocab_id']; ?>" class="form-control" />
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger" name="del_vocab">Xóa</button>
                                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="h1">Ngữ pháp</div>
        <a style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#grammar_add" class="btn btn-danger mb-3 btn-sm"><i class="fa-solid fa-plus"></i> Thêm ngữ pháp</a>
        <div class="table-responsive">
            <table class="table table-bordered align-middle bg-white">
                <thead class="bg-light">
                    <tr class="text-center">
                        <th width="7%">#</th>
                        <th width="15%">Tiêu đề</th>
                        <th width="30%">Định nghĩa</th>
                        <th width="30%">Dấu hiệu</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 0; ?>
                    <?php foreach ($lesson['grammar'] as $value) { ?>
                        <tr>
                            <td class="text-center"><?php echo ++$index; ?></td>
                            <td><?php echo $value['title']; ?></td>
                            <td class="define_management"><?php echo $value['define']; ?></td>
                            <td class="sign_management"><?php echo $value['sign']; ?></td>
                            <td class="text-center">
                                <a style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#detail_edit_<?php echo $value['grammar_id']; ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i> Xem</a>
                                <a style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#grammar_edit_<?php echo $value['grammar_id']; ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-pen"></i> Sửa</a>
                                <a style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#del_edit_<?php echo $value['grammar_id']; ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Xóa</a>
                            </td>
                        </tr>
                        <!-- Detail Grammar Modal -->
                        <div class="modal fade modal-mv" id="detail_edit_<?php echo $value['grammar_id']; ?>">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><?php echo $value['title']; ?></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="content" class="h5">Công thức - cấu trúc: </label>
                                                <div class="text_pane">
                                                    <?php echo $value['content']; ?>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="example" class="h5">Ví dụ: </label>
                                                <div class="text_pane">
                                                    <?php echo $value['example']; ?>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="define" class="h5">Định nghĩa: </label>
                                                <div class="text_pane">
                                                    <?php echo $value['define']; ?>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sign" class="h5">Dấu hiệu nhận biết: </label>
                                                <div class="text_pane">
                                                    <?php echo $value['sign']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Grammar Modal -->
                        <div class="modal fade modal-mv" id="grammar_edit_<?php echo $value['grammar_id']; ?>">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Chỉnh sửa ngữ pháp</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="title" class="h5">Tiêu đề: </label>
                                                <input type="text" name="title" placeholder="Nhập tiêu đề" value="<?php echo $value['title']; ?>" class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="content" class="h5">Công thức - cấu trúc: </label>
                                                <textarea name="content" class="editor" placeholder="Nhập cấu trúc"><?php echo $value['content']; ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="example" class="h5">Ví dụ: </label>
                                                <textarea name="example" class="editor" placeholder="Nhập ví dụ"><?php echo $value['example']; ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="define" class="h5">Định nghĩa: </label>
                                                <textarea name="define" class="editor" placeholder="Nhập định nghĩa"><?php echo $value['define']; ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sign" class="h5">Dấu hiệu nhận biết: </label>
                                                <textarea name="sign" class="editor" placeholder="Nhập dấu hiệu nhận biết"><?php echo $value['sign']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" name="edit_grammar">Chỉnh sửa</button>
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Delete Grammar Modal -->
                        <div class="modal fade" id="del_edit_<?php echo $value['grammar_id']; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Xóa ngữ pháp</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                Xác nhận xóa?
                                                <input type="hidden" name="id" value="<?php echo $value['grammar_id']; ?>" class="form-control" />
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger" name="del_grammar">Xóa</button>
                                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- Add Grammar Modal -->
<div class="modal fade modal-mv" id="grammar_add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm ngữ pháp</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="h5">Tiêu đề: </label>
                        <input type="text" name="title" placeholder="Nhập tiêu đề" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="content" class="h5">Công thức - cấu trúc: </label>
                        <textarea name="content" class="editor" placeholder="Nhập cấu trúc"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="h5">Ví dụ: </label>
                        <textarea name="example" class="editor" placeholder="Nhập ví dụ"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="h5">Định nghĩa: </label>
                        <textarea name="define" class="editor" placeholder="Nhập định nghĩa"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="h5">Dấu hiệu nhận biết: </label>
                        <textarea name="sign" class="editor" placeholder="Nhập dấu hiệu nhận biết"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" name="add_grammar">Thêm</button>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Grammar Modal -->
<div class="modal fade modal-mv" id="vocabulary_add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm từ vựng</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="h5">Từ tiếng anh: </label>
                        <input type="text" name="word" placeholder="Nhập từ" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="title" class="h5">Phiên âm: </label>
                        <input type="text" name="spelling" placeholder="Nhập phiên âm" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="title" class="h5">Nghĩa: </label>
                        <input type="text" name="meaning" placeholder="Nhập nghĩa" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="title" class="h5">Ví dụ: </label>
                        <textarea name="example" placeholder="Nhập ví dụ" class="editor form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="h5">Từ đồng nghĩa: </label>
                        <input type="text" name="synonyms" placeholder="Nhập những từ đồng nghĩa" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="title" class="h5">Từ trái nghĩa: </label>
                        <input type="text" name="antonyms" placeholder="Nhập những từ trái nghĩa" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" name="add_vocab">Thêm</button>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>