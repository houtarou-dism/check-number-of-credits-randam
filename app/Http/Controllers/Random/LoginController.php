<?php

namespace App\Http\Controllers\Random;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Response;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $maxAttempts = 3;     // ログイン試行回数（回）
    protected $decayMinutes = 45;   // ログインロックタイム（分）

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

    public function username(): string
    {
        return 'name';
    }

    public function showLoginForm()
    {
        return view('random.login');
    }

    /**
     * Get the failed login response instance.
     *
     * @return Response
     *
     * @throws ValidationException
     */
    protected function sendFailedLoginResponse(): Response
    {
        throw ValidationException::withMessages([
            $this->authFail() => [trans('auth.failed')],
        ]);
    }

    /**
     * Redirect the user after determining they are locked out.
     *
     * @param Request $request
     * @return void
     *
     * @throws ValidationException
     */
    protected function sendLockoutResponse(Request $request): void
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        throw ValidationException::withMessages([
            $this->authFail() => [Lang::get('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ])],
        ])->status(\Illuminate\Http\Response::HTTP_TOO_MANY_REQUESTS);
    }

    /**
     *
     * @return string
     */
    public function authFail(): string
    {
        return 'auth_fail';
    }
}
