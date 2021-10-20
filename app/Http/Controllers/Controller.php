<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $viewPath;

    /**
     * [__construct description]
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                if (Auth::user()->isImpersonating()) {
                    $this->user = User::find(Session::get('impersonate'));
                } else {
                    $this->user = Auth::user();
                }
                $this->userId       = $this->user->id;
                $this->agencyId     = $this->user->agency_id;
                $this->studioId     = $this->user->studio_id;
                $this->userRoleId   = $this->user->role_id;
                $this->userRoleName = $this->user->role->name;
                $this->tour         = getTour($this->userId);
                $this->tourId       = $this->tour->tour_id;
                if ($this->user->secret_id == "") {
                    saveSecretId($this->userId);
                }
            }
            return $next($request);
        });
    }

    /**
     * [getUserRoleId description]
     */
    public function getUserRoleId()
    {
        return auth()->user()->role->id;
    }

    /**
     * [getUserSignature description]
     */
    public function getUserSignature()
    {
        return auth()->user()->role->name;
    }

    /**
     * [getRoleColumn description]
     */
    public function getRoleColumn()
    {
        $response = [];
        if (auth()->user()->role->name == "Super Admin") {
            $response['agency'] = true;
        }

        if (auth()->user()->role->name == "Super Admin" || auth()->user()->role->name == "Agency Admin") {
            $response['studio'] = true;
        }

        return $response;
    }
}
