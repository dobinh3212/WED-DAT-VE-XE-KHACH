<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr style="background: burlywood;">
                <th>ID</th>
                <th>Họ và tên</th>
                <th>Số điện thoại</th>
                <th>Giới tính</th>
                <th>Email</th>
                <th>Người sửa</th>
                <th style="text-align: center;">Thao tác</th>
            </tr>
        </thead>
        <tbody style="background: floralwhite;">
            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td> {{$customer->sex}}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->user_edit->name??'' }}</td>
                @if( Auth::user()->type_employee == 2 ||Auth::user()->type_employee == 1 )
                <td style="text-align: center;" width="120">
                    {!! Form::open(['route' => ['customer.destroy', $customer->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('customer.show', [$customer->id]) }}" class='btn btn-default btn-xs'>
                          Xem
                        </a>
                        <a href="{{ route('customer.edit', [$customer->id]) }}" class='btn btn-default btn-xs'>
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