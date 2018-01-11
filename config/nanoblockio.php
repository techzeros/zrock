<?php

    return [
    /*
    |--------------------------------------------------------------------------
    | Setting Which Api
    |--------------------------------------------------------------------------
    |
    | Select which api account to call.
    |
    | Supported: 
    | Litecoin,	Bitcoin, Dogecoin, Litecoin (TESTNET!), Bitcoin (TESTNET!), Dogecoin (TESTNET!)
    | "btclive", "btctestnet" 
    | we can add more by creating more array created only 2for now
    | wen adding new array make sure we increment the id like the 2 examples
    */

        
    'whichapi'			=> 'btctestnet', //Enter which api to use also change default_license id
    
    'default_license' => env('DEFAULT_LICENSE', 2), //id of the default current api

    /*
    |--------------------------------------------------------------------------
    | API Account config
    |--------------------------------------------------------------------------
    |
    | Options for api config.  
    |
    */
    

 'btclive' => [
        'id' => 1,
        'account' => env('BLOCKIO_API_LABEL', 'Default BTC Live API'),
        'apiKey' => env('BLOCKIO_API_KEY', '9d16-700c-25a5-7368'),
        'pin' => env('BLOCKIO_PIN', '1337time'),
        'version' => env('BLOCKIO_VERSION', 2),
        'address' => env('NANOCOIN_ADDRESS', '3NxtazVdHUq4L83UacH9aRECGMj8T41KQX'), //CURRENT BTC ADDRESS
 ],

 'btctestnet' => [
        'id' => 2,
        'account' => env('BLOCKIO_API_LABEL', 'Bitcoin (TESTNET!) API'),
        'apiKey' => env('BLOCKIO_API_KEY', '75fd-6b49-0718-5ffa'),
        'pin' => env('BLOCKIO_PIN', '1337time'),
        'version' => env('BLOCKIO_VERSION', 2),
        'address' => env('NANOCOIN_ADDRESS', '2NBb5bcxpDVgZ2PCo1PnbFuzzJSwgs5deQv'), //CURRENT TESTNET ADDRESS
 ],
   
   
   
   
   
    ];