<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCoachRequest;
use App\Http\Requests\CreateCoachRequest;
use App\Models\TypeBuses;
use App\Models\Coach;
use App\Repositories\CoachRepository;
use Flash;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    private $coachRepository;

    public function __construct(CoachRepository $coachRepo)
    {
        $this->middleware('auth');
        $this->coachRepository = $coachRepo;
    }

    public function index()
    {
        $xe = Coach::where('is_active', 1)->orderBy('id', 'desc')->paginate(15);
        return view('admin.xe.index')->with('xe', $xe);
    }


    public function create()
    {
        $loaixe = TypeBuses::pluck('type_bus', 'id');
        return view('admin.xe.create')->with('loaixe', $loaixe);
    }

    public function store(CreateCoachRequest $request)
    {
        $input = $request->all();
        $input['is_active'] = 1;
        $coach = $this->coachRepository->create($input);

        Flash::success('Thêm xe khách thành công.');

        return redirect(route('coach.index'));
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $xe = $this->coachRepository->find($id);
        $number_seat = $xe->number_seat;
        $loaixe = TypeBuses::pluck('type_bus', 'id');
        if (empty($xe)) {
            Flash::error('Xe khách trống');
            return redirect(route('coach.index'));
        }
        return view('admin.xe.edit')->with('xe', $xe)->with('loaixe', $loaixe)->with('number_seat', $number_seat);
    }

    public function update($id, UpdateCoachRequest $request)
    {
        $xe = $this->coachRepository->find($id);
        $input = $request->all();
        $input['is_active'] = 1;
        if (empty($xe)) {
            Flash::error('Xe khách trống');

            return redirect(route('coach.index'));
        }

        $xe = $this->coachRepository->update($input, $id);

        Flash::success('Cập nhật Xe khách thành công.');

        return redirect(route('coach.index'));
    }

    public function destroy($id)
    {
        $xe = $this->coachRepository->find($id);
        if (empty($xe)) {
            Flash::error('Xe khách trống');
            return redirect(route('coach.index'));
        }
        $xe->update(['is_active' => 0]);
        Flash::success('Xóa xe khách thành công.');
        return redirect(route('coach.index'));
    }
}
