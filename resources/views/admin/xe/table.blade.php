<div class="table-responsive">
    <table class="table" id="pricecars-table">
        <thead>
            <tr style="background: burlywood;">
                <th>ID</th>
                <th>Biến số xe</th>
                <th>Loại xe</th>
                <th>Số chỗ</th>
                <th style="text-align: center;">Thao tác</th>
            </tr>
        </thead>
        <tbody style="background: floralwhite;">
            @foreach($xe as $xes)
            <tr>
                <td>{{ $xes->id  }}</td>
                <td>
                    <!-- <a href="{{ route('coach.edit', [$xes->id]) }}"> -->
                    {{ $xes->license_plate  }}
                    <!-- </a> -->
                </td>
                <!-- <td>{{ $post->postCategory->name ?? '-'}}</td> -->
                <td>{{$xes->loaixe->type_bus??''}}</td>
                <td>{{$xes->number_seat??''}}</td>
                @if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
                <td style="text-align: center;" width="120">
                    {!! Form::open(['route' => ['coach.destroy', $xes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('coach.edit', [$xes->id]) }}" class='btn btn-default btn-xs'>
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