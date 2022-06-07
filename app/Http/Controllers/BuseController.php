<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBuseRequest;
use App\Http\Requests\CreateBuseRequest;
use App\Models\Buse;
use App\Models\Coach;
use App\Models\RouteBus;
use App\Repositories\BuseRepository;
use App\User;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuseController extends Controller
{
    private $buseRepository;

    public function __construct(BuseRepository $buseRepo)
    {
        $this->middleware('auth');
        $this->buseRepository = $buseRepo;
    }

    public function index()
    {
        $buse = Buse::orderBy('id', 'desc')->paginate(10);
        return view('admin.chuyenxe.index')->with('buse', $buse);
    }
    public function create()
    {
        $route_id = RouteBus::pluck('route', 'id');
        $driver_id = User::where('type_employee', 0)->pluck('name', 'id');
        $coach_id = Coach::pluck('license_plate', 'id');
        return view('admin.chuyenxe.create')->with('route_id', $route_id)->with('driver_id', $driver_id)->with('coach_id', $coach_id);
    }

    public function store(CreateBuseRequest $request)
    {

        $input = $request->all();
        $coach = Coach::find($request->coach_id)->number_seat;
        $input['number_seat'] = $coach;
        $input['is_active'] = 1;
        $this->buseRepository->create($input);
        Flash::success('Thêm loại xe thành công.');
        return redirect(route('buse.index'));
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $buse = $this->buseRepository->find($id);
        $route_id = RouteBus::pluck('route', 'id');
        $driver_id = User::where('type_employee', 0)->pluck('name', 'id');
        $coach_id = Coach::pluck('license_plate', 'id');
        if (empty($buse)) {
            Flash::error('Loại xe trống trống');
            return redirect(route('buse.index'));
        }
        return view('admin.chuyenxe.edit')->with('buse', $buse)->with('route_id', $route_id)->with('driver_id', $driver_id)->with('coach_id', $coach_id);
    }

    public function update($id, UpdateBuseRequest $request)
    {
        $buse = $this->buseRepository->find($id);
        $input = $request->all();
        $coach = Coach::find($request->coach_id)->number_seat;
        $input['number_seat'] = $coach;
        if (empty($buse)) {
            Flash::error('Chuyến xe trống');

            return redirect(route('buse.index'));
        }

        $buse = $this->buseRepository->update($input, $id);
        Flash::success('Cập nhật chuyến xe thành công.');

        return redirect(route('buse.index'));
    }
    public function edit_active($id)
    {
        $buse = $this->buseRepository->find($id);
        return view('admin.chuyenxe.update_active')->with('buse', $buse);
    }

    public function update_active($id, Request $request)
    {
        $input = $request->is_active;
        Buse::find($id)->update(['is_active' => $input]);
        Flash::success('Cập nhật trạng thái thành công.');

        return redirect(route('buse.index'));
    }

    public function destroy($id)
    {
        $buse = $this->buseRepository->find($id);
        if (empty($buse)) {
            Flash::error('Loại xe trống');
            return redirect(route('buse.index'));
        }
        $buse->delete();
        Flash::success('Xóa chuyến xe thành công.');
        return redirect(route('buse.index'));
    }
    public function edit_active2($id)
    {
        $buse = $this->buseRepository->find($id);
        return view('admin.lichlaixe.update_active')->with('buse', $buse);
    }
    public function update_active2($id, Request $request)
    {
        $input = $request->is_active;
        Buse::find($id)->update(['is_active' => $input]);
        Flash::success('Cập nhật trạng thái thành công.');
        $id = Auth::user()->id;
        $lichtaixes = Buse::where('driver_id', $id)->paginate(5);
        return view('admin.lichlaixe.index')->with('lichtaixes', $lichtaixes);
    }

    public function lichtaixe()
    {
        $id = Auth::user()->id;
        $lichtaixes = Buse::where('driver_id', $id)->paginate(5);
        return view('admin.lichlaixe.index')->with('lichtaixes', $lichtaixes);
    }
}
