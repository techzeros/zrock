<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Models\LoginHistory;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveLoggingActivity
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserLoggedIn  $event
     * @return void
     */
    public function handle(UserLoggedIn $event)
    {
        // dd($event->user_type);

        $user_id = $event->user->id;
        $user_type = $event->user_type;
        $user_agent = \Browser::detect();

        // Determine the type of User
        if ($user_type == 'admin') {
            $user_type = 1;
        } else if ($user_type == 'user') {
            $user_type = 0;
        } else {
            $user_type = null;
        }

        // Flatten the GeoIP Location Object to a Simple Array
        $geoIP = collect(geoip()->getLocation())->flatMap(function ($values) {
            return $values;
        });

        // Log User Activity
        LoginHistory::create([
            'user_id' => $user_id,
            'ip_address' => request()->ip(),
            'user_type' => $user_type,
            'user_agent' => $user_agent,
            'geoip' => $geoIP,
        ]);
    }

     /**
     * Handle a job failure.
     *
     * @return void
     */
    public function failed()
    {
        Auth::logout();
    }

}
