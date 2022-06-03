<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<div class="table-responsive">
    <table class="table" id="pricecars-table">
        <thead>
            <tr style="background: burlywood;">
                <th>ID</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Tình trạng</th>
                @if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
                <th style="text-align: center;">Thao tác</th>
                @endif
            </tr>
        </thead>
        <tbody style="background: floralwhite;">
            @foreach($contacts as $contact)
            <tr>
                <td>{{$contact->id }}</td>
                <td>{{$contact->name}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->phone}}</td>
                <td>{{$contact->title}}</td>
                <td>{{$contact->content}}</td>
                <td>
                    <input data-id="{{$contact->id}}" id="toggle_class_{{$contact->id}}" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-off="Chưa liên hệ" data-on="Đã liên hệ" {{ $contact->is_checked ? 'checked' : '' }}>
                </td>
                @if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
                <td style="text-align: center;" width="120">
                    {!! Form::open(['route' => ['contact.destroy', $contact->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {!! Form::button('<i class="far fa-trash-alt"></i> Xóa', ['type' => 'submit', 'class' => 'btn
                        btn-danger btn-xs', 'onclick' => "return confirm('Bạn có chắc không?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                @endif
            </tr>
            <script>
                $("#toggle_class_{{$contact->id}}").change(function() {
                    var is_checked = $(this).prop('checked') == true ? 0 : 1;
                    var product_id = $(this).data('id');
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: 'admin/is_checked',
                        data: {
                            'is_checked': is_checked,
                            'product_id': product_id
                        },
                        success: function(data) {
                            console.log(data.success)
                        }
                    });
                })
            </script>
            @endforeach
        </tbody>
    </table>
</div>