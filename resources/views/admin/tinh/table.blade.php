<div class="table-responsive">
    <table class="table" id="pricecars-table">
        <thead>
            <tr style="background: burlywood;">
                <th>ID</th>
                <th>Tên tỉnh thành</th>
                <th>Ngày tạo</th>
                <th>Ngày sửa</th>
                <!-- <th>Sơ đồ</th> -->
                <th style="text-align: center;" colspan="3">Thao tác</th>
            </tr>
        </thead>
        <tbody style="background: floralwhite;">
            @foreach($province as $provinces)
            <tr>
                <td>{{ $provinces->id  }}</td>
                <td><a href="{{ route('province.edit', [$provinces->id]) }}">
                        {{ $provinces->name  }}
                    </a>
                </td>
                <td>{{$provinces->created_at}}</td>
                <td>{{$provinces->updated_at}}</td>
                <td style="text-align: center;" width="120">
                    {!! Form::open(['route' => ['province.destroy', $provinces->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <!-- <a href="/xe/{{$provinces->slug}}" target="_blank" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i> Xem 
                        </a> -->
                        <a href="{{ route('province.edit', [$provinces->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i> Sửa 
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i> Xóa', ['type' => 'submit', 'class' => 'btn
                        btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>