<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function(){
        $('#button').click(function(e){
            e.preventDefault();
            var title = $('.title').val();
            var content = $('.content').val();
            $.ajax({
               url: '',
               type: 'post',
               dataType: 'html',
               data: {
                    user : $username,
               }
            });
        });
    });
</script>

<div class="container">
    <h2 class="text-center">Đăng bài viết</h2>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control title" placeholder="Nhập tiêu đề">
        </div>
        <div class="form-group">
            <textarea class="form-control content"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" id="button">Đăng</button>
        </div>
    </form>
    <div class="form-group">
        <textarea class="form-control content" disabled></textarea>
    </div>
</div>