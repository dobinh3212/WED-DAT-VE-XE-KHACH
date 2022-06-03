<div class="table-responsive">
    <table class="table" id="pricecars-table">
        <thead>
            <tr style="background: burlywood;">
                <th>ID</th>
                <th>Loại xe</th>
                <th>Loại ghế</th>
                <th>Số ghế</th>
                <th>Số hàng</th>
                <th>Số cột</th>
                @if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
                <th style="text-align: center;">Thao tác</th>
                @endif
            </tr>
        </thead>
        <tbody style="background: floralwhite;">
            @foreach($loaixe as $loaixes)
            <tr>
                <td>{{ $loaixes->id  }}</td>
                <td><a href="{{ route('type_bus.edit', [$loaixes->id]) }}">
                        {{ $loaixes->type_bus  }}
                    </a>
                </td>
                <!-- <td>{{ $post->postCategory->name ?? '-'}}</td> -->
                <td>{{$loaixes->type_bus}}</td>
                <td>{{$loaixes->seats}}</td>
                <td>{{$loaixes->number_row}}</td>
                <td>{{$loaixes->number_columns}}</td>
                @if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
                <td style="text-align: center;" width="120">
                    {!! Form::open(['route' => ['type_bus.destroy', $loaixes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('type_bus.edit', [$loaixes->id]) }}" class='btn btn-default btn-xs'>
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