<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Inbox;
use App\Providers\RouteServiceProvider;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        $client = new Client();
        $token = 'f3825659be47f337ed78cebfe43976d5';
        $inbox_id = 1162893;
        $uri = 'https://mailtrap.io/api/v1/inboxes/' . $inbox_id . '/messages/';
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];

        $response = $client->get($uri, [
            'headers' => $headers,
        ]);

        $emails = json_decode($response->getBody()->getContents());

        if (!empty($emails)) {
            foreach ($emails as $email) {

                $response = $client->get($uri . $email->id . '/body.txt', [
                    'headers' => $headers,
                ]);

                if ($response->getStatusCode() == 401) {
                    $body = '';
                } else {
                    $body = $response->getBody()->getContents();
                }

                $username = explode('@', $email->to_email);
                $user = User::where('email', $username[0])->first();

                if ($user) {

                    $inbox = Inbox::firstOrCreate([
                        'email_id' => $email->id
                    ]);

                    $inbox->update([
                        'from_email' => $email->from_email,
                        'subject' => $email->subject,
                        'body' => $body,
                        'user_id' => $user->id,
                    ]);
                }

            }
        }
    }


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
