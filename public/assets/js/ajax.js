// Using Ajax to filter user
$(document).ready(function () {
    var role = 0;
    $('#banned').click(function () {
        role = -1;
    });
    $('#member').click(function () {
        role = 0;
    });
    $('#mod').click(function () {
        role = 1;
    });
    $('#cm').click(function () {
        role = 2;
    });
    $('#admin').click(function () {
        role = 3;
    });
    $('#all').click(function () {
        role = 4;
    });
    $('.filter').click(function () {
        $.ajax({
            url: '/admin/load_user',
            type: 'post',
            data: {
                role: role
            },
            dataType: 'json',
            success: function (data) {
                $('#user_list').empty();
                data.forEach(function (user) {
                    $('#user_list').append(
                        '<div class="col-md-4 user-item">' +
                        '    <div class="user-item-border">' +
                        '        <div class="user-item-img">' +
                        '            <img src="/public/Image/user/' + user.avatar + '" class="rounded-circle shadow-4-strong" alt="' + user.name + '">' +
                        '        </div>' +
                        '        <div class="user-item-info">' +
                        '            <div class="name">' +
                        '                <a href="/nguoi-dung/' + user.name + '_' + user.user_id + '.html">' + user.name + '</a>' +
                        '            </div>' +
                        '            <div class="username">' + user.role + '</div>' +
                        '            <div class="location"><i class="fa-solid fa-clock"></i> Tham gia ' + user.create_at + '</div>' +
                        '        </div>' +
                        '    </div>' +
                        '</div>'
                    )
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('Error: ' + textStatus + ' - ' + errorThrown);
            }
        });
    });
});
// Using Ajax to Load Lesson
$(document).ready(function () {
    $('#see_all_10_grade').click(function () {
        var grade = 10;
        $.ajax({
            url: '/Lesson/LoadLesson',
            type: 'post',
            data: {
                grade: grade
            },
            dataType: 'json',
            success: function (data) {
                $('#grade_10_list').empty();
                data.forEach(function (lesson) {
                    $('#grade_10_list').append(
                        '<div class="col-xl-6 mb-4">'+
                        '    <div class="card">'+
                        '        <div class="card-body">'+
                        '            <div class="d-flex justify-content-between align-items-center">'+
                        '                <div class="d-flex align-items-center">'+
                        '                    <img src="/public/Image/lesson/'+lesson.thumb+'" alt="" style="width: 45px; height: 45px" class="rounded-circle" />'+
                        '                    <div class="ms-3">'+
                        '                        <p class="fw-bold mb-1">'+lesson.title+'</p>'+
                        '                        <p class="text-muted mb-0"><i class="fa-solid fa-clock me-2"></i>'+lesson.created_at+'</p>'+
                        '                    </div>'+
                        '                </div>'+
                        '            </div>'+
                        '        </div>'+
                        '        <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">'+
                        '            <a class="m-0 text-reset" href="/Lesson/Save/'+lesson.lesson_id+'" role="button" data-ripple-color="primary">Lưu bài học<i class="fa-solid fa-bookmark ms-2"></i></a>'+
                        '            <a class="m-0 text-reset" href="/bai-hoc/'+lesson.slug+'_'+lesson.lesson_id+'.html" role="button" data-ripple-color="primary">Bắt đầu học<i class="fa-solid fa-angles-right ms-2"></i></a>'+
                        '        </div>'+
                        '    </div>'+
                        '</div>'
                    );
                });
            }
        });
    });
    $('#see_all_11_grade').click(function () {
        var grade = 11;
        $.ajax({
            url: '/Lesson/LoadLesson',
            type: 'post',
            data: {
                grade: grade
            },
            dataType: 'json',
            success: function (data) {
                $('#grade_11_list').empty();
                data.forEach(function (lesson) {
                    $('#grade_11_list').append(
                        '<div class="col-xl-6 mb-4">'+
                        '    <div class="card">'+
                        '        <div class="card-body">'+
                        '            <div class="d-flex justify-content-between align-items-center">'+
                        '                <div class="d-flex align-items-center">'+
                        '                    <img src="/public/Image/lesson/'+lesson.thumb+'" alt="" style="width: 45px; height: 45px" class="rounded-circle" />'+
                        '                    <div class="ms-3">'+
                        '                        <p class="fw-bold mb-1">'+lesson.title+'</p>'+
                        '                        <p class="text-muted mb-0"><i class="fa-solid fa-clock me-2"></i>'+lesson.created_at+'</p>'+
                        '                    </div>'+
                        '                </div>'+
                        '            </div>'+
                        '        </div>'+
                        '        <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">'+
                        '            <a class="m-0 text-reset" href="/Lesson/Save/'+lesson.lesson_id+'" role="button" data-ripple-color="primary">Lưu bài học<i class="fa-solid fa-bookmark ms-2"></i></a>'+
                        '            <a class="m-0 text-reset" href="/bai-hoc/'+lesson.slug+'_'+lesson.lesson_id+'.html" role="button" data-ripple-color="primary">Bắt đầu học<i class="fa-solid fa-angles-right ms-2"></i></a>'+
                        '        </div>'+
                        '    </div>'+
                        '</div>'
                    );
                });
            }
        });
    });
    $('#see_all_12_grade').click(function () {
        var grade = 12;
        $.ajax({
            url: '/Lesson/LoadLesson',
            type: 'post',
            data: {
                grade: grade
            },
            dataType: 'json',
            success: function (data) {
                $('#grade_12_list').empty();
                data.forEach(function (lesson) {
                    $('#grade_12_list').append(
                        '<div class="col-xl-6 mb-4">'+
                        '    <div class="card">'+
                        '        <div class="card-body">'+
                        '            <div class="d-flex justify-content-between align-items-center">'+
                        '                <div class="d-flex align-items-center">'+
                        '                    <img src="/public/Image/lesson/'+lesson.thumb+'" alt="" style="width: 45px; height: 45px" class="rounded-circle" />'+
                        '                    <div class="ms-3">'+
                        '                        <p class="fw-bold mb-1">'+lesson.title+'</p>'+
                        '                        <p class="text-muted mb-0"><i class="fa-solid fa-clock me-2"></i>'+lesson.created_at+'</p>'+
                        '                    </div>'+
                        '                </div>'+
                        '            </div>'+
                        '        </div>'+
                        '        <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">'+
                        '            <a class="m-0 text-reset" href="/Lesson/Save/'+lesson.lesson_id+'" role="button" data-ripple-color="primary">Lưu bài học<i class="fa-solid fa-bookmark ms-2"></i></a>'+
                        '            <a class="m-0 text-reset" href="/bai-hoc/'+lesson.slug+'_'+lesson.lesson_id+'.html" role="button" data-ripple-color="primary">Bắt đầu học<i class="fa-solid fa-angles-right ms-2"></i></a>'+
                        '        </div>'+
                        '    </div>'+
                        '</div>'
                    );
                });
            }
        });
    });
});

