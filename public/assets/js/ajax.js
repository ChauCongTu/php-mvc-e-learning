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
})
