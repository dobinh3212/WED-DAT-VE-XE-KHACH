<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr style="background: burlywood;">
                <th>Họ và tên</th>
                <th>Số điện thoại</th>
                <th>Loại nhân viên</th>
                <th>Giới tính</th>
                <!-- <th>Địa chỉ</th> -->
                <th>Email</th>
                <th>Bằng lái</th>
                <th style="text-align: center;" colspan="3">Thao tác</th>
            </tr>
        </thead>
        <tbody style="background: floralwhite;">
            @foreach($users as $user)
            <tr>
                <td> <a href="{{ route('users.show', [$user->id]) }}">{{ $user->name }}</a></td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->type_employee==1?'Quản trị viên':'Tài xế' }}</td>
                <td>{{ $user->sex }}</td>
                <!-- <td>{{ $user->diachi }}</td> -->
                <td>{{ $user->email }}</td>
                <td>{{ $user->license }}</td>
                <td style="text-align: center;" width="120">
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-default btn-xs'>
                                 Sửa 
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