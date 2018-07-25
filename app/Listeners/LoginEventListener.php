<?php

namespace App\Listeners;

use App\Events\LoginEvent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginEventListener
{
    protected $SUCCESS = "success";
    protected $FAIL = "fail";

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
     * @param  LoginEvent  $event
     * @return void
     */
    public function handle(LoginEvent $event)
    {
        $remote_address = $event->request->server("REMOTE_ADDR");
        $remote_port = $event->request->server("REMOTE_PORT");
        $request_uri = $event->request->server("REQUEST_URI");
        $http_user_agent = $event->request->server("HTTP_USER_AGENT");
        $http_referer = $event->request->server("HTTP_REFERER");
        
        if($event->type_attempt == $this->SUCCESS) {
            $message = "[Success Login Attempt]-[Date:" . now()->addHours(3) . "]-[Remote Address:" . $remote_address . "]-[Remote Port: " . $remote_port . "]-[Request URI: " . $request_uri . "]-[User Agent: " . $http_user_agent . "]-[HTTP Referer: " . $http_referer . "]-[User Email: " . $event->request->email . "]";
            Storage::append('success_login.log', $message);
        } else {
            $message = "[Failed Login Attempt]-[Date:" . now()->addHours(3) . "]-[Remote Address:" . $remote_address . "]-[Remote Port: " . $remote_port . "]-[Request URI: " . $request_uri . "]-[User Agent: " . $http_user_agent . "]-[HTTP Referer: " . $http_referer . "]-[User Email: " . $event->request->email . "]";
            Storage::append('failed_login.log', $message);
        }
    }
}
