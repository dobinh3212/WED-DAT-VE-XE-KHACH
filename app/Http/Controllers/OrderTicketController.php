<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\OrderTicket;
use App\Repositories\OrderTicketRepository;
use Flash;
use Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderTicketController extends Controller
{
    private $orderTicketRepository;

    public function __construct(OrderTicketRepository $orderTicketRepo)
    {
        $this->middleware('auth');
        $this->orderTicketRepository = $orderTicketRepo;
    }

    public function index()
    {
        $order_ticket = OrderTicket::paginate(15);
        return view('admin.order_ticket.index')->with('order_ticket', $order_ticket);
    }
    // public function create()
    // {
    //     // $xe = Xe::where('is_active', 1)->pluck('name', 'id');
    //     return view('admin.order_ticket.create');
    // }

    // public function store(Request $request)
    // {
    //     $input = $request->all();
    //     $order_ticket = $this->provinceRepository->create($input);
    //     Flash::success('Thêm tỉnh thành thành công.');
    //     return redirect(route('province.index'));
    // }
    // public function show($id)
    // {
    //     //
    // }
    public function edit($id)
    {
        $order_ticket = $this->orderTicketRepository->find($id);

        if (empty($order_ticket)) {
            Flash::error('Vé trống');
            return redirect(route('province.index'));
        }
        return view('admin.order_ticket.edit')->with('order_ticket', $order_ticket);
    }

    public function update($id, Request $request)
    {
        $order_ticket = $this->orderTicketRepository->find($id);
        $input = $request->all();
        if (empty($order_ticket)) {
            Flash::error('Vé trống');
            return redirect(route('order_ticket.index'));
        }
        $order_ticket = $this->orderTicketRepository->update($input, $id);
        Flash::success('Cập nhật trạng thái thành công.');

        return redirect(route('order_ticket.index'));
    }

    public function destroy($id)
    {
        $order_ticket = $this->orderTicketRepository->find($id);
        if (empty($order_ticket)) {
            Flash::error('Vé trống');
            return redirect(route('order_ticket.index'));
        }
        $order_ticket->delete();
        Flash::success('Xóa vé thành công.');
        return redirect(route('order_ticket.index'));
    }
}
