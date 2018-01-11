<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Setting;
use Auth;
use DB;

class AjaxController extends Controller
{
    //
    public function btc_submit_new_address(Request $request)
    {
        $max_addresses_per_account = Setting::get('max_addresses_per_account');
        $id = Auth::user()->id;
       // $data = $request->all(); // This will get all the request data.


        $nums = DB::table('btc_users_addresses')->where('user_id', $id)->get();
        if($nums->count() > $max_addresses_per_account) {
            $data['status'] = 'error';
            $data['msg'] = nanoerror(__('user/dashboard.error_40'). " $max_addresses_per_account");
        } else {
        $label = $request->label;
        if(!empty($label) && !isValidUsername($label)) 
            {
            $data['status'] = 'error'; 
            $data['msg'] = nanoerror(__('user/dashboard.success_17'));
         }
        else {
            if(empty($label)) {
                 $label = str_random(7); 
                }
            $generate_address = btc_generate_address($label); //no need to pass id it will get id from Auth
            if($generate_address) {
                $data['status'] = 'success';
                $data['msg'] = nanosuccess(__('user/dashboard.success_17'). " <b>$generate_address</b>.");
            } else {
                $data['status'] = 'error';
                $data['msg'] = nanoerror(__('user/dashboard.error_42'));
            }
        }
        }
        return response()->json($data);
       // return json_encode($data);
       // dd($data); // This will dump and die
    }

}
