<div class="table-responsive">
    <table class="table" id="pricecars-table">
        <thead>
            <tr style="background: burlywood;">
                @if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
                <th style="text-align: center;">Thao tác</th>
                @endif
                <th>ID</th>
                <th>Tiêu đề</th>
                <!-- <th>Nội dung</th> -->
                <th>Ảnh</th> 
                <th>Giới thiệu</th>
            </tr>
        </thead>
        <tbody style="background: floralwhite;">
            @foreach($news as $new)
            <tr>
                @if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
                <td style="text-align: center;" width="120">
                    {!! Form::open(['route' => ['news.destroy', $new->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('news.edit', [$new->id]) }}" class='btn btn-default btn-xs'>
                            </i> Sửa
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i> Xóa', ['type' => 'submit', 'class' => 'btn
                        btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                @endif
                <td>{{ $new->id}}</td>
                <td>{{ $new->title}}</td>
                <td> <img src="{{asset("/upload/$new->image")}}" height="140" width="250"></td>
                <td>{{$new->introduce}}</td>
                <!-- <td>{{$new->content}}</td> -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>