<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRouteBusRequest;
use App\Http\Requests\CreateRouteBusRequest;
use App\Models\BusStop;
use App\Models\Province;
use App\Models\TypeBuses;
use App\Models\RouteBus;
use App\Repositories\RouteBusRepository;
use Flash;
use Str;
use Illuminate\Http\Request;

class RouteBusController extends Controller
{
    private $route_busRepository;

    public function __construct(RouteBusRepository $route_busRepo)
    {
        $this->middleware('auth');
        $this->route_busRepository = $route_busRepo;
    }

    public function index()
    {
        $route_bus = RouteBus::orderBy('id', 'desc')->paginate(15);
        return view('admin.lotrinh.index')->with('route_bus', $route_bus);
    }


    public function create()
    {
        $rest_stop = BusStop::pluck('name', 'id');
        $province = Province::pluck('name', 'id');
        return view('admin.lotrinh.create')->with('rest_stop', $rest_stop)->with('province', $province);
    }

    public function store(CreateRouteBusRequest $request)
    {
        $input = $request->all();
        $departure_name = Province::find($request->departure)->name;
        $destination_name = Province::find($request->destination)->name;
        $input['route'] = $departure_name . ' - ' . $destination_name;
        $file_name_time = null;
        if ($request->hasFile('image')) {
            $file_name = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->image->getClientOriginalExtension();
            $name_slug = Str::slug($file_name, '_');
            $file_name_time = $name_slug . '_' . time() . '.' . $extension;
            $path = public_path('/image/');
            $request->file('image')->move($path, $file_name_time);
        }

        $input['image'] = $file_name_time;
        $input['departure'] = $departure_name;
        $input['destination'] = $destination_name;
        $route_bus = $this->route_busRepository->create($input);

        Flash::success('Thêm lộ trình thành công.');

        return redirect(route('route_bus.index'));
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $route_bus = $this->route_busRepository->find($id);
        $rest_stop = BusStop::pluck('name', 'id');
        $province = Province::pluck('name', 'id');
        if (empty($rest_stop)) {
            Flash::error('Lộ trình trống trống');
            return redirect(route('route_bus.index'));
        }
        return view('admin.lotrinh.edit')->with('route_bus', $route_bus)->with('rest_stop', $rest_stop)->with('province', $province);
    }

    public function update($id, UpdateRouteBusRequest $request)
    {
        $route_bus = $this->route_busRepository->find($id);
        $input = $request->all();
        $departure = Province::find($request->departure)->name;
        $destination = Province::find($request->destination)->name;
        $file_name_time = null;
        if ($request->hasFile('image')) {
            $file_name = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->image->getClientOriginalExtension();
            $name_slug = Str::slug($file_name, '_');
            $file_name_time = $name_slug . '_' . time() . '.' . $extension;
            $path = public_path('/image/');
            $request->file('image')->move($path, $file_name_time);
        }
        $departure = $departure;
        $destination = $destination;
        $input['route'] = $departure . ' - ' . $destination;
        $input['image'] = $file_name_time;
        if (empty($route_bus)) {
            Flash::error('Lộ trình trống');

            return redirect(route('route_bus.index'));
        }
        $input['departure'] = $departure;
        $input['destination'] = $destination;
        $this->route_busRepository->update($input, $id);

        Flash::success('Cập nhật lộ trình thành công.');

        return redirect(route('route_bus.index'));
    }

    public function destroy($id)
    {
        $route_bus = $this->route_busRepository->find($id);
        if (empty($route_bus)) {
            Flash::error('Lộ trình trống');
            return redirect(route('route_bus.index'));
        }
        $route_bus->delete();
        Flash::success('Xóa lộ trình thành công.');
        return redirect(route('route_bus.index'));
    }
    public function hot(Request $request)
    {
        $new = RouteBus::find($request->product_id);
        $new->hot = $request->hot;
        $new->save();
        return response()->json(['success' => 'Thay đổi trạng thái thành công.']);
    }
}
