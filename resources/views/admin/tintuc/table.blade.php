<div class="table-responsive">
    <table class="table" id="pricecars-table">
        <thead>
            <tr style="background: burlywood;">
            <th style="text-align: center;" colspan="3">Thao tác</th>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Ảnh</th>
                <th>Giới thiệu</th>
                <th>Nội dung</th>
            </tr>
        </thead>
        <tbody style="background: floralwhite;">
            @foreach($news as $new)
            <tr>
            <td style="text-align: center;" width="120">
                    {!! Form::open(['route' => ['news.destroy', $new->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <!-- <a href="/xe/{{$new->slug}}" target="_blank" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i> Xem 
                        </a> -->
                        <a href="{{ route('news.edit', [$new->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i> Sửa 
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i> Xóa', ['type' => 'submit', 'class' => 'btn
                        btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                <td>{{ $new->id  }}</td>
                <td><a href="{{ route('news.edit', [$new->id]) }}">
                        {{ $new->title  }}
                    </a>
                </td>
                <!-- <td>{{ $post->postCategory->name ?? '-'}}</td> -->
                <td>{{$new->title}}</td>
                <td>{{$new->introduce}}</td>
                <td>{{$new->content}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>