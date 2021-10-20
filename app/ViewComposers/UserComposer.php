<?php

namespace App\ViewComposers;

use App\Models\User;
use Auth;
use Illuminate\View\View;
use Session;

class UserComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (Auth::check()) {

            if (Auth::user()->isImpersonating()) {
                $user = User::find(Session::get('impersonate'));
            } else {
                $user = auth()->user();
            }

            $userType = "";
            if ($user->role->name == "Super Admin") {
                $userType = "superAdmin";
            }
            if ($user->role->name == "Agency Admin") {
                $userType = "agencyAdmin";
            }
            if ($user->role->name == "Training Admin") {
                $userType = "trainingAdmin";
            }
            if ($user->role->name == "Spaces Admin") {
                $userType = "spacesAdmin";
            }

            $tour = getTour($user->id);
            $view->with('tourId', $tour->tour_id);
            $view->with('countHour', countHour($tour->date, $tour->working_start_time));
            $view->with('user', $user);
            $view->with('userId', $user->id);
            $view->with('userRoleName', $user->role->name);
            $view->with('userType', $userType);
            $view->with('layoutTheme', "layouts.app");
        }
    }
}
