<div class="table-responsive">
    <table class="table" id="pricecars-table">
        <thead>
            <tr style="background: burlywood;">
                <th>ID</th>
                <th>Lộ trình</th>
                <th>Tài xế</th>
                <th>Xe</th>
                <th>Ngày xuất phát</th>
                <th>Thời gian xuất phát</th>
                <!-- <th>Trạng thái</th> -->
                <th>Giá vé</th>
                <th style="text-align: center;" colspan="3">Thao tác</th>
            </tr>
        </thead>
        <tbody style="background: floralwhite;">
            @foreach($buse as $buses)
            <tr>
                <td><a href="{{ route('buse.edit', [$buses->id]) }}">{{ $buses->id  }}  </a></td>
                <td>{{ $buses->lotrinh->departure }}</td>
                <!-- <td>{{ $post->postCategory->name ?? '-'}}</td> -->
                <td>{{$buses->taixe->name}}</td>
                <td>{{$buses->xe->license_plate}}</td>
                <td style="text-align: center;">{{$buses->start_day}}</td>
                <td style="text-align: center;">{{$buses->start_time}}</td>
                <td>{{number_format($buses->price)}} VND</td>
                <td style="text-align: center;" width="120">
                    {!! Form::open(['route' => ['buse.destroy', $buses->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <!-- <a href="/xe/{{$buses->slug}}" target="_blank" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i> Xem 
                        </a> -->
                        <a href="{{ route('buse.edit', [$buses->id]) }}" class='btn btn-default btn-xs'>
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