<div class="table-responsive">
    <table class="table" id="pricecars-table">
        <thead>
            <tr style="background: burlywood;">
                <th>ID</th>
                <th>Tên tỉnh thành</th>
                <th style="text-align: center;">Thao tác</th>f
            </tr>
        </thead>
        <tbody style="background: floralwhite;">
            @foreach($province as $provinces)
            <tr>
                <td>{{ $provinces->id }}</td>
                <td>{{ $provinces->name }}</td>
                @if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
                <td style="text-align: center;" width="120">
                    {!! Form::open(['route' => ['province.destroy', $provinces->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('province.edit', [$provinces->id]) }}" class='btn btn-default btn-xs'>
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