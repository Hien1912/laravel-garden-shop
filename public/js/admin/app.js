let App = {} || App;

App.logout = function () {
    $.confirm({
        title: false,
        content: "Thoát khỏi phiên làm việc",
        buttons: {
            "Xác nhận": {
                btnClass: "btn-warning",
                action: function () {
                    $.post("/logout");
                    location.reload();
                }
            },
            "Hủy": {
                btnClass: "btn-secondary"
            }
        }
    });
};

App.sideBar = function () {
    $('.navbar-toggler.d-none.d-lg-block').click(function () {
        $('#side-left').toggleClass('d-lg-block');
        $('#content').toggleClass('toggle-side');
    });

    $("navbar-toggler.d-block.d-lg-none").click(function () {
        $('#side-left').toggleClass('d-block');
        $('#content').toggleClass('toggle-side');
    });
};

App.uri = {
    'dashboard': "Dashboard",
    'san-pham': "Sản phẩm",
    'don-hang': "Đơn hàng",
    'cay-canh': "Cây cảnh",
    'chau-canh': "Chậu cảnh",
    'phu-kien': "Phụ Kiện",
    'thung-rac': "Thùng rác",
    'tiep-nhan': "Tiếp nhận",
    'xac-nhan': "Xác nhận",
    'dang-gui': "Gửi hàng",
    'hoan-tat': "Hoàn tất",
    'huy': "Hủy",

};

App.breadcrumb = function () {
    let array = location.pathname.split("/");
    let uri = array.slice(1, array.length);
    uri.forEach(v => {
        $('header .breadcrumb').append(`
            <li class="breadcrumb-item">${App.uri[v]}</li>
        `);
    });
};

App.init = function () {
    App.sideBar();
    App.breadcrumb();
}


$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    App.init();
});

