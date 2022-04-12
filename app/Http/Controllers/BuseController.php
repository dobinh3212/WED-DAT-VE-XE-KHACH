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
        $buse = Buse::paginate(15);
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
        $buse = $this->buseRepository->create($input);
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
        if (empty($buse)) {
            Flash::error('Chuyến xe trống');

            return redirect(route('buse.index'));
        }

        $buse = $this->buseRepository->update($input, $id);

        Flash::success('Cập nhật chuyến xe thành công.');

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
}
