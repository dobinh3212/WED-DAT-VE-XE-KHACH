<?php

namespace App\Http\Controllers;

use App\Repositories\CustomersRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Buse;
use App\Models\Customer;
use App\Models\OrderTicket;
use App\Models\Users;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerController extends AppBaseController
{

    private $customersRepository;

    public function __construct(CustomersRepository $customerRepo)
    {
        $this->middleware('auth');
        $this->customersRepository = $customerRepo;
    }

    public function index()
    {

        $customers = Customer::orderBy('id', 'desc')->paginate(15);
        return view('admin.customer.index')
            ->with('customers', $customers);
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $customers = Customer::create($input);
        $customers = Customer::orderBy('id', 'desc')->paginate(15);

        Flash::success('Thêm khách hàng thành công.');
        return view('admin.customer.index')->with('customers', $customers);
    }

    public function show($id)
    {
        $customers = $this->customersRepository->find($id);
        if (empty($customers)) {
            Flash::error('Không thấy khách hàng');
            return redirect(route('customer.index'));
        }
        return view('admin.customer.show')->with('customers', $customers);
    }

    public function edit($id)
    {
        $customers = Customer::find($id);
        return view('admin.Customer.edit')->with('customers', $customers);
    }

    public function update($id, Request $request)
    {
        $customers = Customer::find($id);
        $input = $request->all();
        if ($request->password == null) {
            $input['password'] = $customers->password;
        } else {
            $input['password'] = Hash::make($request->password);
        }
        $input['user_edit_id'] = Auth::user()->id;
        $this->customersRepository->update($input, $id);

        Flash::success('Cập nhật khách hàng thành công.');
        return redirect(route('customer.index'));
    }
    public function destroy($id)
    {
        $Customer = Customer::findOrFail($id);
        $Customer->delete();
        return redirect(route('customer.index'));
    }
}
