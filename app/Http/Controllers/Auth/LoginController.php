<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\LoginPemakaiK;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:web')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function redirectPath()
    {
        return route('home');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function username()
    {
        return 'nama_pemakai';
    }

    // protected function guard()
    // {
    //     return Auth::guard('simrs');
    // }

    public function attemptLogin(Request $request)
    {
        $old = $this->oldUsers($request);
        // dd($old);
        if ($old === null) return false; //otomatis tidak bisa login karena user tidak ada
        if ($this->userLaravel($request) !== null) {
            return $this->attemptUserLaravel($request); //jika udh pernah login maka langsung pake auth user
        }
        //jika blm pernah login dan password match dengan loginpemakai -> membuat auth user dengan password yang dimasukkan
        if (md5($request->password) === $old->katakunci_pemakai) {
            $newUser = $this->createNewUser($request, $old);
            // $this->guard()->login($old); //login sebagai guard simrs
            // return true;
            return Auth::attempt(['username' => $newUser->username, 'password' => $request->password], $request->has('remember'));
        }
    }

    public function attemptUserLaravel($request)
    {
        return Auth::attempt(['username' => $request->username, 'password' => $request->password], $request->has('remember'));
    }

    public function userLaravel($request)
    {
        return User::where('username', $request->username)->first();
    }

    public function createNewUser($request, $old)
    {
        return User::create([
            'username' => $old->nama_pemakai,
            'loginpemakai_id' => $old->loginpemakai_id,
            'password' => $request->password
        ]);
    }

    public function oldUsers($request)
    {
        return LoginPemakaiK::where($this->username(), $request->username)->first();
    }
    
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'username' => [trans('auth.failed')],
        ]);
    }
}