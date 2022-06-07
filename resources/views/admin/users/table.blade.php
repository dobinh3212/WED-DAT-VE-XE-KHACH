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
                <th style="text-align: center;">Thao tác</th>
            </tr>
        </thead>
        <tbody style="background: floralwhite;">
            @foreach($users as $user)
            <tr>
                <td> <a href="{{ route('users.show', [$user->id]) }}">{{ $user->name }}</a></td>
                <td>{{ $user->phone }}</td>
                <td>
                    @if($user->type_employee==1)
                    Admin
                    @elseif($user->type_employee==2)
                    SupperAdmin
                    @else
                    Tài xế
                    @endif
                </td>
                <td>{{ $user->sex }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->license }}</td>

                <td style="text-align: center;" width="120">
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @if(Auth::user()->type_employee == 2||Auth::user()->id == $user->id )
                        <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-default btn-xs'>
                            Sửa
                        </a>
                        @endif
                        @if( Auth::user()->type_employee == 2)
                        @if( $user->type_employee == 2)
                        @else
                        {!! Form::button('<i class="far fa-trash-alt"></i> Xóa', ['type' => 'submit', 'class' => 'btn
                        btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endif
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>