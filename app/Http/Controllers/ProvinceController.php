<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProvinceRequest;
use App\Http\Requests\CreateProvinceRequest;
use App\Models\Province;
use App\Repositories\ProvinceRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProvinceController extends Controller
{
    private $provinceRepository;

    public function __construct(ProvinceRepository $provinceRepo)
    {
        $this->middleware('auth');
        $this->provinceRepository = $provinceRepo;
    }

    public function index()
    {
        $province = Province::paginate(15);
        return view('admin.tinh.index')->with('province', $province);
    }
    public function create()
    {
        // $xe = Xe::where('is_active', 1)->pluck('name', 'id');
        return view('admin.tinh.create');
    }

    public function store(CreateProvinceRequest $request)
    {
        $input = $request->all();
        $province = $this->provinceRepository->create($input);
        Flash::success('Thêm tỉnh thành thành công.');
        return redirect(route('province.index'));
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $province = $this->provinceRepository->find($id);

        if (empty($province)) {
            Flash::error('Tỉnh thành trống');
            return redirect(route('province.index'));
        }
        return view('admin.tinh.edit')->with('province', $province);
    }

    public function update($id, UpdateProvinceRequest $request)
    {
        $province = $this->provinceRepository->find($id);
        $input = $request->all();
        if (empty($province)) {
            Flash::error('Tỉnh thành trống');

            return redirect(route('province.index'));
        }

        $province = $this->provinceRepository->update($input, $id);

        Flash::success('Cập nhật tỉnh thành thành công.');

        return redirect(route('province.index'));
    }

    public function destroy($id)
    {  
        $province = $this->provinceRepository->find($id);
        if (empty($province)) {
            Flash::error('Tỉnh thành trống');
            return redirect(route('type_bus.index'));
        }
        $province ->delete();
        Flash::success('Xóa tỉnh thành thành công.');
        return redirect(route('province.index'));
    }
}
