<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SaveFilter;
use App\Models\User;
use App\Scopes\StudioScope;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        return array_merge($request->only($this->username(), 'password'), ['is_active' => "0"]);
    }

    /**
     * [redirectTo description]
     * @return [type] [description]
     */
    public function redirectTo()
    {
        if (Auth::user()) {

            $user   = Auth::user();
            $theme  = "horizontal";
            $locale = "en";

            if ($user->theme != "") {
                $theme = $user->theme;
            }

            if ($user->locale != "") {
                $locale = $user->locale;
            }

            if (!Session::has("theme_type")) {
                Session::put("theme_type", $theme);
            }

            if (!Session::has("locale")) {
                Session::put("locale", $locale);
            }

            if (Auth::user()->isImpersonating()) {
                return route("user.get");
            }

            return "/";
        }
    }

    /**
     * [logout description]
     * @return [type] [description]
     */
    public function logout()
    {
        if (Auth::user()) {
            $userId = Auth::id();
            $msg    = " has been logout from kendra erp";
            activityLog("Account", $userId, $msg, "-");

            $saveFilter = SaveFilter::withoutGlobalScope(StudioScope::class)->where("is_remember", "1")->where("user_id", $userId)->first();
            if ($saveFilter) {
                $saveFilter->name        = null;
                $saveFilter->filter_type = null;
                $saveFilter->filter_html = null;
                $saveFilter->save();
            }
            Auth::logout();
            Session::flush();
        }
        return redirect('/');
    }
}
