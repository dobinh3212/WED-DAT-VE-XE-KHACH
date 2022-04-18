<div class="table-responsive">
    <table class="table" id="pricecars-table">
        <thead>
            <tr style="background: burlywood;">
                <th>ID</th>
                <th>Điểm xuất phát</th>
                <th>Điểm cuối cùng</th>
                <th>Các điểm dừng</th>
                <th>Thời gian</th>
                @if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
                <th style="text-align: center;" colspan="3">Thao tác</th>
                @endif
            </tr>
        </thead>
        <tbody style="background: floralwhite;">
            @foreach($route_bus as $route_buss)
            <tr>
                <td><a href="{{ route('route_bus.edit', [$route_buss->id]) }}">{{ $route_buss->id}}</a></td>
                <td>{{$route_buss->departure??'' }}</td>
                <td>{{$route_buss->destination??''}}</td>
                <td>{{$route_buss->bus_stop->name??''}}</td>
                <td>{{$route_buss->time_intend}} tiếng</td>

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
            @endforeach
        </tbody>
    </table>
</div>