<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr style="background: burlywood;">
                <th>ID</th>
                <th>Họ và tên</th>
                <th>Số điện thoại</th>
                <!-- <th>Ngày Sinh</th> -->
                <th>Giới tính</th>
                <th>Email</th>
                @if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
                <th style="text-align: center;" colspan="3">Thao tác</th>
                @endif
            </tr>
        </thead>
        <tbody style="background: floralwhite;">
            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <!-- <td>{{date('d-m-Y',strtotime($customer->date_birth))}}</td> -->
                <td> {{$customer->sex}}</td>
                <td>{{ $customer->email }}</td>
                @if( Auth::user()->type_employee == 2 ||Auth::user()->id == $customer->id )
                <td style="text-align: center;" width="120">
                    {!! Form::open(['route' => ['customer.destroy', $customer->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('customer.edit', [$customer->id]) }}" class='btn btn-default btn-xs'>
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