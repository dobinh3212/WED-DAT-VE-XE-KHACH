<div class="table-responsive">
    <table class="table" id="pricecars-table">
        <thead>
            <tr style="background: burlywood;">
                <th>ID</th>
                <th>Tên điểm dừng</th>
                <th>Vị trí điểm dừng</th>
                @if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
                <th style="text-align: center;" colspan="3">Thao tác</th>
                @endif
            </tr>
        </thead>
        <tbody style="background: floralwhite;">
            @foreach($busstop as $busstops)
            <tr>
                <td>{{ $busstops->id  }}</td>
                <td>
                    <!-- <a href="{{ route('busstop.edit', [$busstops->id]) }}"> -->
                    {{ $busstops->name  }}
                    <!-- </a> -->
                </td>
                <!-- <td>{{ $post->postCategory->name ?? '-'}}</td> -->
                <td>{{$busstops->position}}</td>
                @if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
                <td style="text-align: center;" width="120">
                    {!! Form::open(['route' => ['busstop.destroy', $busstops->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <!-- <a href="/xe/{{$busstops->slug}}" target="_blank" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i> Xem 
                        </a> -->
                        <a href="{{ route('busstop.edit', [$busstops->id]) }}" class='btn btn-default btn-xs'>
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