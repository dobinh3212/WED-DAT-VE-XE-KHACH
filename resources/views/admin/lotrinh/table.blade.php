<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<div class="table-responsive">
    <table class="table" id="pricecars-table">
        <thead>
            <tr style="background: burlywood;">
                <th>ID</th>
                <th>Điểm xuất phát</th>
                <th>Điểm cuối cùng</th>
                <!-- <th>Các điểm dừng</th> -->
                <th>Thời gian</th>
                <th>Quảng đường</th>
                <th>Phổ biến</th>
                @if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
                <th style="text-align: center;">Thao tác</th>
                @endif
            </tr>
        </thead>
        <tbody style="background: floralwhite;">
            @foreach($route_bus as $route_buss)
            <tr>
                <td><a href="{{ route('route_bus.edit', [$route_buss->id]) }}">{{ $route_buss->id}}</a></td>
                <td>{{$route_buss->departure??'' }}</td>
                <td>{{$route_buss->destination??''}}</td>
                <!-- <td>{{$route_buss->bus_stop->name??''}}</td> -->
                <td>{{$route_buss->time_intend}} tiếng</td>
                <td>{{$route_buss->km}} Km</td>
                <td>
                    <input data-id="{{$route_buss->id}}" id="toggle_class_{{$route_buss->id}}" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Bật" data-off="Tắt" {{ $route_buss->hot ? 'checked' : '' }}>
                </td>
                @if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
                <td style="text-align: center;" width="120">
                    {!! Form::open(['route' => ['route_bus.destroy', $route_buss->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('route_bus.edit', [$route_buss->id]) }}" class='btn btn-default btn-xs'>
                            Sửa
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i> Xóa', ['type' => 'submit', 'class' => 'btn
                        btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                @endif
            </tr>
            <script>
                $("#toggle_class_{{$route_buss->id}}").change(function() {
                    var hot = $(this).prop('checked') == true ? 1 : 0;
                    var product_id = $(this).data('id');
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: 'admin/hot',
                        data: {
                            'hot': hot,
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