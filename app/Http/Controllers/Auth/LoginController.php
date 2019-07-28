<?php

namespace MIDASHI\Http\Controllers\Auth;

use MIDASHI\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

use MIDASHI\User;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /*
    * Social auth
    */
    public function redirectToGoogle()
    {
        //googleへリダイレクト
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        // Google 認証後の処理
        $gUser = Socialite::driver('google')->stateless()->user();
        //ユーザーが存在するかチェック
        $user = User::where('email', $gUser->email)->first();

        //存在しない場合は新規作成
        if ($user == null) {
            $user = $this->createUserByGoogle($gUser);
        }

        //ログイン処理
        \Auth::login($user, true);
        return redirect('/home');
    }

    public function createUserByGoogle($gUser)
    {
        $user = new User();

        $user->forceFill([
            'name' => $gUser->name,
            'email' => $gUser->email,
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => \Hash::make(uniqid()),
        ])
            ->save();

        // $user = User::create([
        //     'name' => $gUser->name,
        //     'email' => $gUser->email,
        //     'email_verified_at' => date('Y-m-d H:i:s', time()),
        //     'password' => \Hash::make(uniqid()),
        // ]);

        return $user;
    }

    public function redirectToTwitter()
    {
        //twitterへリダイレクト
        return Socialite::driver('twitter')->redirect();
    }

    public function handleTwitterCallback()
    {
        // twitter 認証後の処理
        $tUser = Socialite::driver('twitter')->user();
        //ユーザーが存在するかチェック
        $user = User::where('email', $tUser->email)->first();

        //存在しない場合は新規作成
        if ($user == null) {
            $user = $this->createUserByTwitter($tUser);
        }

        //ログイン処理
        \Auth::login($user, true);
        return redirect('/home');
    }

    public function createUserByTwitter($tUser)
    {
        $user = new User();

        $user->forceFill([
            'name' => $tUser->name,
            'email' => 'y.sawa@mt-heap.tech', //$tUser->email,
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => \Hash::make(uniqid()),
        ])
            ->save();

        return $user;
    }
}
