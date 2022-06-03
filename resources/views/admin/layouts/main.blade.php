<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đặt vé xe khách | Trang quản trị</title>
    <!-- Tell the browser to be responsive to screen width -->
    <link rel="shortcut icon" href="{{ asset('images/icons/bus1.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ asset('') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/backend/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/backend/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/backend/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/backend/dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }
    </style>
    <script type="text/javascript">
        var base_url = '{{ url(' / ') }}';
    </script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Datatables -->
    <style>
        .dataTables_info {
            position: absolute;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                "bPaginate": false,
                "paging": false,
                "order": [
                    [3, "desc"]
                ],
                "dom": "ifrt",
                "scrollX": false,
                "language": {
                    "processing": "Đang xử lý...",
                    "lengthMenu": "Xem _MENU_ mục",
                    "zeroRecords": "Không tìm thấy dòng nào phù hợp",
                    "info": "Hiển thị _START_ đến _END_ trong tổng  _TOTAL_ kết quả",
                    "infoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                    "infoFiltered": "(được lọc từ _MAX_ mục)",
                    "search": "Tìm kiếm:",
                    "paginate": {
                        "first": "Đầu",
                        "previous": "Trước",
                        "next": "Tiếp",
                        "last": "Cuối"
                    },
                    "aria": {
                        "sortAscending": ": Sắp xếp thứ tự tăng dần",
                        "sortDescending": ": Sắp xếp thứ tự giảm dần"
                    },
                    "autoFill": {
                        "cancel": "Hủy",
                        "fill": "Điền tất cả ô với <i>%d<\/i>",
                        "fillHorizontal": "Điền theo hàng ngang",
                        "fillVertical": "Điền theo hàng dọc",
                        "info": "Mẫu thông tin tự động điền"
                    },
                    "buttons": {
                        "collection": "Chọn lọc <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                        "colvis": "Hiển thị theo cột",
                        "colvisRestore": "Khôi phục hiển thị",
                        "copy": "Sao chép",
                        "copyKeys": "Nhấn Ctrl hoặc u2318 + C để sao chép bảng dữ liệu vào clipboard.<br \/><br \/>Để hủy, click vào thông báo này hoặc nhấn ESC",
                        "copySuccess": {
                            "1": "Đã sao chép 1 dòng dữ liệu vào clipboard",
                            "_": "Đã sao chép %d dòng vào clipboard"
                        },
                        "copyTitle": "Sao chép vào clipboard",
                        "csv": "File CSV",
                        "excel": "File Excel",
                        "pageLength": {
                            "-1": "Xem tất cả các dòng",
                            "1": "Hiển thị 1 dòng",
                            "_": "Hiển thị %d dòng"
                        },
                        "pdf": "File PDF",
                        "print": "In ấn"
                    },
                    "emptyTable": "Không có dữ liệu nào để hiển thị",
                    // "infoPostFix": "Đang hiển thị dòng _START_ tới dòng _END_ trong tổng số _TOTAL_ mục",
                    "infoThousands": "`",
                    "loadingRecords": "Loading...",
                    "select": {
                        "1": "%d dòng đang được chọn",
                        "_": "%d dòng đang được chọn",
                        "cells": {
                            "1": "1 ô đang được chọn",
                            "_": "%d ô đang được chọn"
                        },
                        "columns": {
                            "1": "1 cột đang được chọn",
                            "_": "%d cột đang được được chọn"
                        },
                        "rows": {
                            "1": "1 dòng đang được chọn",
                            "_": "%d dòng đang được chọn"
                        }
                    },
                    "thousands": "`",
                    "searchBuilder": {
                        "title": {
                            "_": "Thiết lập tìm kiếm (%d)",
                            "0": "Thiết lập tìm kiếm"
                        },
                        "button": {
                            "0": "Thiết lập tìm kiếm",
                            "_": "Thiết lập tìm kiếm (%d)"
                        },
                        "value": "Giá trị",
                        "clearAll": "Xóa hết",
                        "condition": "Điều kiện",
                        "conditions": {
                            "date": {
                                "after": "Sau",
                                "before": "Trước",
                                "between": "Nằm giữa",
                                "empty": "Rỗng",
                                "equals": "Bằng với",
                                "not": "Không phải",
                                "notBetween": "Không nằm giữa",
                                "notEmpty": "Không rỗng"
                            },
                            "number": {
                                "between": "Nằm giữa",
                                "empty": "Rỗng",
                                "equals": "Bằng với",
                                "gt": "Lớn hơn",
                                "gte": "Lớn hơn hoặc bằng",
                                "lt": "Nhỏ hơn",
                                "lte": "Nhỏ hơn hoặc bằng",
                                "not": "Không phải",
                                "notBetween": "Không nằm giữa",
                                "notEmpty": "Không rỗng"
                            },
                            "string": {
                                "contains": "Chứa",
                                "empty": "Rỗng",
                                "endsWith": "Kết thúc bằng",
                                "equals": "Bằng",
                                "not": "Không phải",
                                "notEmpty": "Không rỗng",
                                "startsWith": "Bắt đầu với"
                            }
                        },
                        "logicAnd": "Và",
                        "logicOr": "Hoặc",
                        "add": "Thêm điều kiện",
                        "data": "Dữ liệu",
                        "deleteTitle": "Xóa quy tắc lọc"
                    },
                    "searchPanes": {
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Không có phần tìm kiếm",
                        "clearMessage": "Xóa hết",
                        "loadMessage": "Đang load phần tìm kiếm",
                        "collapse": {
                            "0": "Phần tìm kiếm",
                            "_": "Phần tìm kiếm (%d)"
                        },
                        "title": "Bộ lọc đang hoạt động - %d",
                        "count": "{total}"
                    }
                }
            });
        });
    </script>
    @stack('page_css')
    @include('admin.layouts.datatables_js')
    @include('admin.layouts.datatables_css')
    <div class="wrapper">

        @include('admin.layouts.header')
        <!-- Left side column. contains the logo and sidebar -->
        @include('admin.layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <!-- <script src="/backend/bower_components/jquery/dist/jquery.min.js"></script> -->
    <!-- Bootstrap 3.3.7 -->
    <script src="/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Slimscroll -->
    <!-- <script src="/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
    <!-- FastClick -->
    <script src="/backend/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/backend/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/backend/dist/js/demo.js"></script>

    <script src="/backend/bower_components/ckeditor/ckeditor.js"></script>

    <!-- Thêm File JS ở đây -->
    <script src="/backend/js/main.js"></script>

    <!-- Vị trí dùng để chèn code Javascript -->
    @yield('my_javascript')

</body>

</html>