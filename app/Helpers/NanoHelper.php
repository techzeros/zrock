
<?php

/**
 * @package     NanoCoins
 * @copyright   2017 Nanacoins. All rights reserved.
 * @license     DSPG License
 * @author      Portal, Chux Da Great 'TAYLOR OTWELL' of our Branch and Victor
 */

/**
* change plain number to formatted currency
*
* @param $number
*/
function formatNumber($number)
{
   return number_format("$number", 2);
}

function isValidURL($url) {
	return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
}


function http_get_site($url, $safemode = false){
  if($safemode === true) sleep(1);
  $im = curl_init($url);
  curl_setopt($im, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($im, CURLOPT_CONNECTTIMEOUT, 10);
  curl_setopt($im, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($im, CURLOPT_HEADER, 0);
  return curl_exec($im);
  curl_close();
}

function currencyConvertor($amount,$from_Currency,$to_Currency) {
	 $amount = urlencode($amount);
	  $from_Currency = urlencode($from_Currency);
	  $to_Currency = urlencode($to_Currency);
	  $get = "https://finance.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency";
	  $get = http_get_site($get,true);
	  $get = explode("<span class=bld>",$get);
	  $get = explode("</span>",$get[1]);  
	  $converted_amount = preg_replace("/[^0-9\.]/", null, $get[0]);
	  return ceil($converted_amount);
}


function isValidUsername($str) {
    return preg_match('/^[a-zA-Z0-9-_]+$/',$str);
}

function isValidEmail($str) {
	return filter_var($str, FILTER_VALIDATE_EMAIL);
}

function formatBytes($bytes, $precision = 2) { 
    if ($bytes > pow(1024,3)) return round($bytes / pow(1024,3), $precision)."GB";
    else if ($bytes > pow(1024,2)) return round($bytes / pow(1024,2), $precision)."MB";
    else if ($bytes > 1024) return round($bytes / 1024, $precision)."KB";
    else return ($bytes)."B";
} 

/**
* convert std class to array 
* @param $class
*/
function StdClass2array($class) 
{
    $array = array();

    foreach ($class as $key => $item)
    {
            if ($item instanceof StdClass) {
                    $array[$key] = StdClass2array($item);
            } else {
                    $array[$key] = $item;
            }
    }

    return $array;
}

function nanoblockioConfig(){
    //returns an array of nanoblockio.php Config but casted to object
    $whichapi = config('nanoblockio.whichapi');
    return (object)[
        'id' => config("nanoblockio.$whichapi.id"),
        'account' => config("nanoblockio.$whichapi.account"),
        'apiKey' => config("nanoblockio.$whichapi.apiKey"),
        'pin' => config("nanoblockio.$whichapi.pin"),
        'version' => config("nanoblockio.$whichapi.version"),
        'address' => config("nanoblockio.$whichapi.address")
    ];
}

function nanosuccess($text) {
	return '<div class="alert alert-success"><i class="fa fa-check"></i> '.$text.'</div>';
}

function nanoerror($text) {
	return '<div class="alert alert-danger"><i class="fa fa-times"></i> '.$text.'</div>';
}

function nanoinfo($text) {
	return '<div class="alert alert-info"><i class="fa fa-info-circle"></i> '.$text.'</div>';
}


function idinfo($value) {
    //$query = DB::table('users')->where('id', $uid)->first();
    //return $query->$value;
    return Auth::user()->$value;
}	


function walletinfo($uid, $value) {
    $query = DB::table('btc_users_addresses')->where('user_id', $uid)->first();
    return $query->$value;
}	

function addressinfo($address,$value) {
    $query = DB::table('btc_users_addresses')->where('address', $address)->get();
    return $query->$value;
}

function addrinfo($id,$value) {
    $query = DB::table('btc_users_addresses')->where('user_id', $id)->get();
    return $query->$value;
}	

function get_user_balance_btc($uid) {
    $queries = DB::table('btc_users_addresses')->where('user_id', $uid)
    ->where('archived', 0)->get();
	if($queries->count() > 0) {
		$balance = '0.0000000';
        foreach ($queries as $query) {
            
        $balance = $balance + $query->available_balance;
      //  dd($balance);
        }
        
		}
	else {
		$balance = '0.0000000';
	}
	return number_format($balance,8);
}

function get_total_btc() {

    $queries = DB::table('btc_users_addresses')
    ->where('archived', 0)->get();

    if($queries->count() > 0) {
		$balance = '0.0000000';
		 foreach ($queries as $query) {
			$balance = $balance + $query->available_balance;
		}
	} else {
		$balance = '0.0000000';
	}
	return number_format($balance,8);
}

function get_user_pending_balance_btc($uid) {
    $queries = DB::table('btc_users_addresses')->where('user_id', $uid)
    ->where('archived', 0)->get();
	if($queries->count() > 0) {
		$balance = '0.0000000';
        foreach ($queries as $query) {
            
        $balance = $balance + $query->pending_received_balance;
      //  dd($balance);
        }
        
		}
	else {
		$balance = '0.0000000';
	}
	return number_format($balance,8);
}

function get_user_balance_usd($uid) {
    $default_currency = Setting::get('default_currency', 'NGN');
	if($default_currency == "USD") {
		$balance_btc = get_user_balance_btc($uid);
		$btc_price = get_current_bitcoin_price();
		$balance = $balance_btc * $btc_price;
		$balance = number_format($balance,2);
	} else {
		$balance_btc = get_user_balance_btc($uid);
		$btc_price = get_current_bitcoin_price();
		$balance = $balance_btc * $btc_price;
		//$balance = number_format($balance,2); //remove comma first b4 passing to converter
		$balance = currencyConvertor($balance,"USD", $default_currency);
	}
	return formatNumber($balance) .' '. $default_currency; 	
}

function get_current_bitcoin_price() {
    $queries = DB::table('btc_prices')->where('currency', 'USD')
    ->orderBy('price', 'desc')
    ->take(1)
    ->get();
    if($queries->count() > 0) {
		 foreach ($queries as $query) {
		$btc_price = $query->price;
        }
		return $btc_price;
	}
}

function btc_buy_price() {
    $default_currency = Setting::get('default_currency', 'NGN');
    $autoupdate_bitcoin_price = Setting::get('autoupdate_bitcoin_price', '1');
    $bitcoin_buy_fee = Setting::get('bitcoin_buy_fee');
    $bitcoin_fixed_price = Setting::get('bitcoin_fixed_price');
	if($default_currency == "USD") {
		if($autoupdate_bitcoin_price == "1") {
		        	$btcprice = get_current_bitcoin_price();
					$calculate1 = ($btcprice * $bitcoin_buy_fee) / 100;
					$calculate2 = $btcprice - $calculate1;
					$btc_price = $calculate2;
		} else {
			        $btcprice = $bitcoin_fixed_price;
					$btc_price = $btcprice;
		}
	} else {
		if($autoupdate_bitcoin_price == "1") {
			$btcprice = get_current_bitcoin_price();
					$calculate1 = ($btcprice * $bitcoin_buy_fee) / 100;
					$calculate2 = $btcprice - $calculate1;
					$btc_price = $calculate2;
					$btc_price = currencyConvertor($btc_price,"USD",$default_currency);
		} else {
		        	$btcprice = $bitcoin_fixed_price;
					$btc_price = $btcprice;
					$btc_price = currencyConvertor($btc_price,"USD",$default_currency);
		}
	}
	$btc_price = formatNumber($btc_price);
	return $btc_price;
} 

function btc_sell_price() {
    $default_currency = Setting::get('default_currency', 'NGN');
    $autoupdate_bitcoin_price = Setting::get('autoupdate_bitcoin_price', '1');
    $bitcoin_sell_fee = Setting::get('bitcoin_sell_fee');
    $bitcoin_fixed_price = Setting::get('bitcoin_fixed_price');
	if($default_currency == "USD") {
		if($autoupdate_bitcoin_price == "1") {
			        $btcprice = get_current_bitcoin_price();
					$calculate1 = ($btcprice * $bitcoin_sell_fee) / 100;
					$calculate2 = $btcprice - $calculate1;
					$btc_price = $calculate2;
		} else {
			        $btcprice = $bitcoin_fixed_price;
					$btc_price = $btcprice;
		}
	} else {
		if($autoupdate_bitcoin_price == "1") {
			$btcprice = get_current_bitcoin_price();
					$calculate1 = ($btcprice * $bitcoin_sell_fee) / 100;
					$calculate2 = $btcprice - $calculate1;
					$btc_price = $calculate2;
					$btc_price = currencyConvertor($btc_price,"USD",$default_currency);
		} else {
			$btcprice = $bitcoin_fixed_price;
					$btc_price = $btcprice;
					$btc_price = currencyConvertor($btc_price,"USD",$default_currency);
		}
	}
	$btc_price = formatNumber($btc_price);
	return $btc_price.' '.$default_currency;
}


function btc_generate_address($label) {
        $whichapi = config('nanoblockio.whichapi');
     	$license_id = config("nanoblockio.$whichapi.id");
         $default_license = config("nanoblockio.$whichapi.default_license");
        $user_name = camel_case(Auth::user()->name);
        $label = 'usr_'.$user_name.'_'.$label;
        $user_id = Auth::user()->id;
        // Create new address.

        $new_address = NanoCoinBlockIo::createAddress($label);
		if($new_address->status == "success") {
			$addr = $new_address->data->address;
			$time = now();
			$insert = DB::table('btc_users_addresses')->insert([
                    [
                     'address' => $addr, 
                     'label' => $label, 
                     'user_id' => $user_id,
                     'license_id' => $license_id, 
                     'available_balance' => '0.00000000', 
                     'pending_received_balance' => '0.00000000', 
                     'status' => '1', 
                     'created_at' => $time,
                     'updated_at' => $time
                     ]
                ]);
                $update = DB::table('btc_blockio_api_servers')
                ->where('id', $license_id)
                ->increment('addresses');
			return $addr;
		} else {
			return false;
		}
	
}

function btc_update_balance($uid) {
    $get_address = DB::table('btc_users_addresses')
    ->where('user_id', $uid)
    ->get();
	if($get_address->count() > 0) {
		foreach($get_address as $get) {
            if(nanoblockioConfig()->id == $get->license_id){
			$user_address = $get->address;
            $balance = NanoCoinBlockIo::getAddressesBalanceByAddress($user_address);
			if($balance->status == "success") {
				$available_balance = $balance->data->available_balance;
                $pending_received_balance = $balance->data->pending_received_balance;
                $update = DB::table('btc_users_addresses')
                                ->where('user_id', $uid)
                                ->where('id', $get->id)
                                ->update([
                                'available_balance' => $available_balance,
                                'pending_received_balance' => $pending_received_balance
                                ]);
			}
        }
    }

	}
}

function admin_get_profit() {
	$admin_address = nanoblockioConfig()->address;
	$balance = NanoCoinBlockIo::getAddressesBalanceByAddress($admin_address);
	if($balance->status == "success") {
		$time = time();
		$available_balance = $balance->data->available_balance;
		$pending_received_balance = $balance->data->pending_received_balance;
		return $available_balance.' BTC';
	} else {
		return '0.0000 BTC';
	}
}

function btc_update_transactions($uid) {
    

    $get_address = DB::table('btc_users_addresses')->where('user_id', $uid)->get();
	if($get_address->count() > 0) {
		foreach($get_address as $get) {

            if(nanoblockioConfig()->id == $get->license_id){
                $received = NanoCoinBlockIo::getTransactionsByAddresses('received', $get->address);
                if($received->status == "success") {	
                    $data = $received->data->txs;
                    $dt = StdClass2array($data);
                    foreach($dt as $k=>$v) {
                        $txid = $v['txid'];
                        $time = $v['time'];
                        $amounts = $v['amounts_received'];
                        $amounts = StdClass2array($amounts);
                        foreach($amounts as $a => $b) {
                            $recipient = $b['recipient'];
                            $amount = $b['amount'];
                        } 
                        $senders = $v['senders'];
                        $senders = StdClass2array($senders);
                        foreach($senders as $c => $d) {
                             $sender = $d;
                        }
                        $confirmations = $v['confirmations'];
                            $check = DB::table('btc_users_transactions')
                            ->where('user_id', $uid)
                            ->where('txid', $txid)->get();
                            if($check->count() > 0) {
                                $update = DB::table('btc_users_transactions')
                                ->where('user_id', $uid)
                                ->where('txid', $txid)
                                ->update([
                                'confirmations' => $confirmations 
                                ]);
                            } else {
                                $insert = DB::table('btc_users_transactions')->insert([
                                    ['uid' => $uid, 
                                    'type' => 'received',
                                    'recipient' => $recipient,
                                    'sender' => $sender,
                                    'amount' => $amount,
                                    'time' => $time,
                                    'confirmations' => $confirmations,
                                    'txid' => $txid
                                    ]
                                ]);
                            }
                    }
                }
                $sent = NanoCoinBlockIo::getTransactionsByAddresses('sent', $get->address);
                if($sent->status == "success") {	
                    $data = $sent->data->txs;
                    $dt = StdClass2array($data);
                    foreach($dt as $k=>$v) {
                        $txid = $v['txid'];
                        $time = $v['time'];
                        $amounts = $v['amounts_sent'];
                        $amounts = StdClass2array($amounts);
                        foreach($amounts as $a => $b) {
                            $recipient = $b['recipient'];
                            $amount = $b['amount'];
                        } 
                        $senders = $v['senders'];
                        $senders = StdClass2array($senders);
                        foreach($senders as $c => $d) {
                             $sender = $d;
                        }
                        $confirmations = $v['confirmations'];
                        $check = DB::table('btc_users_transactions')
                        ->where('user_id', $uid)
                        ->where('txid', $txid)->get();
                        if($check->count() > 0) {
                            $update = DB::table('btc_users_transactions')
                                ->where('user_id', $uid)
                                ->where('txid', $txid)
                                ->update([
                                'confirmations' => $confirmations 
                                ]);
                            } else {
                                $insert = DB::table('btc_users_transactions')->insert([
                                    ['uid' => $uid, 
                                    'type' => 'sent',
                                    'recipient' => $recipient,
                                    'sender' => $sender,
                                    'amount' => $amount,
                                    'time' => $time,
                                    'confirmations' => $confirmations,
                                    'txid' => $txid
                                    ]
                                ]);
                            }
                    }
                }

            }


		}
	}
}

function btc_delete_fee_transactions($uid) {
    $get_address = DB::table('btc_users_addresses')->where('user_id', $uid)->get();
	if($get_address->count() > 0) {
		foreach($get_address as $get) {
		$addr = nanoblockioConfig()->address;
        $query = DB::table('btc_users_transactions')
        ->where('user_id', $uid)
        ->where('type', 'sent')
        ->get();
		if($query->count() > 0) {
			foreach($query as $row) {
				if($addr >= $row['recipient']) {
                    $delete = DB::table('btc_users_transactions')
                    ->where('user_id', $uid)
                    ->where('id', '$row[id]')
                    ->delete();
				}
			}
		}
		}
	}
}

function btc_get_bitcoin_prices() {
	
		$price = NanoCoinBlockIo::getCurrentPrice('USD');
		$prices = $price->data->prices;
		$prices = StdClass2array($prices);
		foreach($prices as $k => $v) {
			foreach($v as $a => $b) {
				$rows[$a] = $b;
            }
            $exchange = $rows['exchange'];
            $currency = $rows['price_base'];
            $price = $rows['price'];
			$queries = DB::table('btc_prices')->where('source', $exchange)
            ->where('currency', $currency)
            ->get();
            if($queries->count() > 0) {
                $update = DB::table('btc_prices')
                ->where('source', $exchange)
                ->where('currency', $currency)
                ->update([
                'price' => $price 
                ]);
			} else {
				$insert = DB::table('btc_prices')->insert([
                    ['source' => $exchange, 'price' => $price, 'currency' => $currency]
                ]);
        
            }
		}
	}


