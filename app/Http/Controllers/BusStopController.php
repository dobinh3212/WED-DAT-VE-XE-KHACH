<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBusStopRequest;
use App\Http\Requests\CreateBusStopRequest;
use App\Models\BusStop;
use App\Repositories\BusStopRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusStopController extends Controller
{
    private $busstopRepository;

    public function __construct(BusStopRepository $busstopRepo)
    {
        $this->middleware('auth');
        $this->busstopRepository = $busstopRepo;
    }

    public function index()
    {
        $busstop = BusStop::paginate(15);
        return view('admin.tramdung.index')->with('busstop', $busstop);
    }


    public function create()
    {
        return view('admin.tramdung.create');
    }

    public function store(CreateBusStopRequest $request)
    {
        $input = $request->all();
        $input['user_create'] = Auth::user()->name;
        $busstop = $this->busstopRepository->create($input);
        Flash::success('Thêm điểm dừng thành công.');
        return redirect(route('busstop.index'));
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $busstop = $this->busstopRepository->find($id);
        if (empty($busstop)) {
            Flash::error('Điểm dừng trống');
            return redirect(route('busstop.index'));
        }
        return view('admin.tramdung.edit')->with('busstop', $busstop);
    }

    public function update($id, UpdateBusStopRequest $request)
    {
        $busstop = $this->busstopRepository->find($id);
        $input = $request->all();
        $input['user_update'] = Auth::user()->name;
        if (empty($busstop)) {
            Flash::error('Điểm dừng trống');

            return redirect(route('busstop.index'));
        }

        $busstop = $this->busstopRepository->update($input, $id);

        Flash::success('Cập nhật điểm dừng thành công.');

        return redirect(route('busstop.index'));
    }

    public function destroy($id)
    {  
        $busstop = $this->busstopRepository->find($id);
        if (empty($busstop)) {
            Flash::error('Điểm dừng trống');
            return redirect(route('busstop.index'));
        }
        $busstop->delete();
        Flash::success('Xóa điểm dừng thành công.');
        return redirect(route('busstop.index'));
    }
}
