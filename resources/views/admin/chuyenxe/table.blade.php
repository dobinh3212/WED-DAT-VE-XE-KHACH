<div class="table-responsive">
    <table class="table" id="pricecars-table">
        <thead>
            <tr style="background: burlywood;">
                <th>ID</th>
                <th>Lộ trình</th>
                <th>Tài xế</th>
                <th>Xe</th>
                <th>Số chỗ còn trống</th>
                <th>Thời gian xuất phát</th>
                <th>Ngày xuất phát</th>
                <th>Giá vé</th>
                <th style="width: 129px;">Trạng thái</th>
                <th style="text-align: center;">Thao tác</th>
            </tr>
        </thead>
        <tbody style="background: floralwhite;">
            @foreach($buse as $buses)
            <tr>
                <td><a href="{{ route('buse.edit', [$buses->id]) }}">{{ $buses->id  }} </a></td>
                <td>{{ $buses->lotrinh->route??''}}</td>
                <td>{{$buses->taixe->name??''}}</td>
                <td>{{$buses->xe->license_plate??''}}</td>
                <td style="text-align: center;">{{$buses->number_seat}} chỗ</td>
                <td style="text-align: center;">{{$buses->start_time}}</td>
                <td style="text-align: center;">{{date('d-m-Y',strtotime($buses->start_day))}}</td>
                <td>{{number_format($buses->price)}} VND</td>
                @if ($buses->is_active == 1)
                <td class="btn-group" style="color: red;font-weight: bold;">{{ 'Đang chờ' }}
                    @elseif($buses->is_active == 2)
                <td class="btn-group" style="color: #150ce9;font-weight: bold;">{{ 'Đang chạy' }}
                    @else
                <td class="btn-group" style="color: #1de35d;font-weight: bold;"> {{'Hoàn thành'}}
                    @endif
                    <a href="{{ route('edit_active', [$buses->id]) }}" class='btn btn-default btn-xs'>
                        <i class="fa fa-edit" style="font-size:20px;color:red"></i>
                    </a>
                </td>
                @if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
                <td style="text-align: center;" width="120">
                    {!! Form::open(['route' => ['buse.destroy', $buses->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>

                        <a href="{{ route('buse.edit', [$buses->id]) }}" class='btn btn-default btn-xs'>
                            Sửa
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i> Xóa', ['type' => 'submit', 'class' => 'btn
                        btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                @else
                <td style="text-align: center;" width="120">
                    <div class='btn-group'>
                        <a class='btn btn-default btn-xs'>
                            Sửa
                        </a>
                        <a class='btn btn-danger btn-xs'>
                            Xóa
                        </a>
                    </div>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>