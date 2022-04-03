<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTypeBuseRequest;
use App\Http\Requests\CreateTypeBusesRequest;
use App\Models\TypeBuses;
use App\Repositories\TypeBusesRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeBusesController extends Controller
{
    private $typebusesRepository;

    public function __construct(TypeBusesRepository $typebusesRepo)
    {
        $this->middleware('auth');
        $this->typebusesRepository = $typebusesRepo;
    }

    public function index()
    {
        $loaixe = TypeBuses::paginate(15);
        return view('admin.loaixe.index')->with('loaixe', $loaixe);
    }
    public function create()
    {
        // $xe = Xe::where('is_active', 1)->pluck('name', 'id');
        return view('admin.loaixe.create');
    }

    public function store(CreateTypeBusesRequest $request)
    {
        $input = $request->all();
        $input['user_create'] = Auth::user()->name;
        $loaixe = $this->typebusesRepository->create($input);
        Flash::success('Thêm loại xe thành công.');
        return redirect(route('type_bus.index'));
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $loaixe = $this->typebusesRepository->find($id);

        if (empty($loaixe)) {
            Flash::error('Loại xe trống trống');
            return redirect(route('type_bus.index'));
        }
        return view('admin.loaixe.edit')->with('loaixe', $loaixe);
    }

    public function update($id, UpdateTypeBuseRequest $request)
    {
        $loaixe = $this->typebusesRepository->find($id);
        $input = $request->all();
        $input['user_update'] = Auth::user()->name;
        if (empty($loaixe)) {
            Flash::error('Loại xe trống');

            return redirect(route('type_bus.index'));
        }

        $loaixe = $this->typebusesRepository->update($input, $id);

        Flash::success('Cập nhật loại xe thành công.');

        return redirect(route('type_bus.index'));
    }

    public function destroy($id)
    {  
        $loaixe = $this->typebusesRepository->find($id);
        if (empty($loaixe)) {
            Flash::error('Loại xe trống');
            return redirect(route('type_bus.index'));
        }
        $loaixe ->delete();
        Flash::success('Xóa loại loaixe thành công.');
        return redirect(route('type_bus.index'));
    }
}
