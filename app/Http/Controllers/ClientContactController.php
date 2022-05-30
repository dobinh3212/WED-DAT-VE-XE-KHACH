<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;

class ClientContactController extends Controller
{
        public function contact(Request $request)
        {
                $input = $request->all();
                $input['date_submit'] = Carbon::now();
                $input['is_checked'] = 0; // 0 là chưa liên hệ
                Contact::create($input);
                $setting = Setting::first();
                return view('client.lienhe.lienhe', ["setting" => $setting]);
        }
        public function index()
        {
                $contacts = Contact::orderBy('id', 'desc')->paginate(15);
                return view('admin.lienhe.index')
                        ->with('contacts', $contacts);
        }
        public function destroy($id)
        {
                $contacts = Contact::findOrFail($id);
                $contacts->delete();
                Flash::success('Xóa thành công');
                return redirect(route('contact.index'));
        }
        public function updateStatus(Request $request)
        {
                $new = Contact::find($request->product_id);
                $new->is_checked = $request->is_checked;
                $new->save();
                return response()->json(['success' => 'Thay đổi trạng thái thành công']);
        }
}
