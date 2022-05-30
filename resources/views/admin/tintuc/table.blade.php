     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
     <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
     <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

     <body>
         <div class="table-responsive">
             <table class="table" id="pricecars-table">
                 <thead>
                     <tr style="background: burlywood;">
                         @if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
                         <th style="text-align: center;">Thao tác</th>
                         @endif
                         <th>ID</th>
                         <th>Tiêu đề</th>
                         <th style="text-align: center;">Ảnh</th>
                         <th>Giới thiệu</th>
                         <th>Hiển thị slide</th>
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
                         <td>
                             <input data-id="{{$new->id}}" id="toggle_class_{{$new->id}}" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Bật" data-off="Tắt" {{ $new->check_slide ? 'checked' : '' }}>
                         </td>
                     </tr>
                     <script>
                         $("#toggle_class_{{$new->id}}").change(function() {
                             var check_slide = $(this).prop('checked') == true ? 1 : 0;
                             var product_id = $(this).data('id');
                             $.ajax({
                                 type: "GET",
                                 dataType: "json",
                                 url: 'admin/status_update',
                                 data: {
                                     'check_slide': check_slide,
                                     'product_id': product_id
                                 },
                                 success: function(data) {
                                     console.log(data.success)
                                 }
                             });
                         })
                     </script>
                     @endforeach
                 </tbody>
             </table>
         </div>
     </body>