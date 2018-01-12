<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User\BtcUserAddress;
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

    public function btc_refresh_addresses()
    {
          //arrange and place in blade later
          $user_id = Auth::user()->id;
          $userAddresses = BtcUserAddress::getUserAddress();

																	if($userAddresses->count() > 0) { 

																		foreach($userAddresses as $row) {
																		?>
																		<tr id="btc_address_<?php echo $row->id; ?>">
																			<td> <?php $exp = 'usr_'.$user_id.'_';
																					$expl = explode($exp,$row->label); echo $expl[0]; ?> </td>																			</td>
																			<td> <?php echo $row->address; ?> </td>
																			<td> <?php echo $row->available_balance; ?> BTC </td>
																			<td>
																				 <a href="#modal_send_from_address" data-id="<?php echo $row->id; ?>" class="walletDialog btn btn-circle btn-sm btn-primary" data-toggle="modal" title="<?php echo __('user/dashboard.btn_6'); ?>"><i class="fa fa-arrow-circle-o-up" style="margin:0px;"></i></a>
																				<a class="btn btn-circle btn-sm btn-icon btn-default" data-id="<?php echo $row->id; ?>" href="#modal_receive_to_address" data-toggle="modal" title="<?php echo __('user/dashboard.btn_7'); ?>" <i class="fa fa-arrow-circle-o-down" style="margin:0px;"></i></a> 
																				<a class="btn btn-circle btn-sm btn-icon btn-default" data-id="<?php echo $row->id; ?>" href="#btc_archive_address" data-toggle="tooltip" data-placement="top" title="<?php echo __('user/dashboard.btn_9'); ?>" ><i class="fa fa-archive" style="margin:0px;"></i></a>
																				<a class="btn btn-circle btn-sm btn-icon btn-default" data-id="<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="top" title="<?php echo __('user/dashboard.btn_10'); ?>" href="../transactions_by_address/<?php echo $row->address; ?>"><i class="fa fa-bars" style="margin:0px;"></i></a> 
																			
																			</td>
																		</tr>
																		<?php
																		}
																	} else {
																		echo '<tr><td colspan="4">';
																		echo info(__('user/dashboard.info_2')); 
																		echo '</td></tr>';
																	}




    }

}
