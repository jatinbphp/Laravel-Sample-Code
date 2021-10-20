<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgencyRequest;
use App\Models\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public $moduleName;
    public $range;

    /**
     * [__construct description]
     */
    public function __construct()
    {
        parent::__construct();
        $this->moduleName = "Agency";
        $this->viewPath = "agency.";
        $this->range = 500;
    }

    /**
     * [index description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $whereStr = '1 = ?';
            $whereParams = [1];

            if (isset($request->name) && $request->name != "") {
                $whereStr .= " AND agencies.name like '%" . $request->name . "%'";
            }

            if (isset($request->email) && $request->email != "") {
                $whereStr .= " AND agencies.email like '%" . $request->email . "%'";
            }

            if (isset($request->city) && $request->city != "") {
                $whereStr .= " AND agencies.city like '%" . $request->city . "%'";
            }

            if (isset($request->state) && $request->state != "") {
                $whereStr .= " AND agencies.state like '%" . $request->state . "%'";
            }

            if (isset($request->country) && $request->country != "") {
                $whereStr .= " AND agencies.country like '%" . $request->country . "%'";
            }

            if (isset($request->pin_code) && $request->pin_code != "") {
                $whereStr .= " AND agencies.pin_code like '%" . $request->pin_code . "%'";
            }

            if (isset($request->phone_no) && $request->phone_no != "") {
                $whereStr .= " AND agencies.phone_no like '%" . $request->phone_no . "%'";
            }

            if (isset($request->is_active) && $request->is_active != "") {
                $statusIds = "'" . str_replace(",", "','", $request->is_active) . "'";
                $whereStr .= " AND agencies.is_active IN (" . $statusIds . ") ";
            }

            $columns = ['agencies.id', 'agencies.logo', 'agencies.name', 'agencies.email', 'agencies.address', 'agencies.city', 'agencies.state', 'agencies.country', 'agencies.pin_code', 'agencies.phone_no', 'agencies.is_active'];

            $agency = Agency::select($columns)
                ->whereRaw($whereStr, $whereParams);

            if ($this->userRoleName != "Super Admin") {
                $agency = $agency->where("agencies.id", $this->agencyId);
            }

            if ($agency) {
                $total = $agency->get();
            }

            if ($request->has('iDisplayStart') && $request->get('iDisplayLength') != '-1') {
                $agency = $agency->take($request->get('iDisplayLength'))->skip($request->get('iDisplayStart'));
            }

            if ($request->has('iSortCol_0')) {
                $sql_order = '';
                for ($i = 0; $i < $request->get('iSortingCols'); $i++) {
                    $column = $columns[$request->get('iSortCol_' . $i)];
                    if (false !== ($index = strpos($column, ' as '))) {
                        $column = substr($column, 0, $index);
                    }
                    $agency = $agency->orderBy($column, $request->get('sSortDir_' . $i));
                }
            }

            $agency = $agency->get();

            $final = $permission = [];

            foreach ($agency as $key => $value) {
                $image = '';
                if ($value->logo != "") {
                    $image = '<a data-id="' . $value->id . '" title="' . trans('message.edit') . '" class="editAdminAgency">
                    <span class="center" > <img style="max-width:100%" src="' . $value->logo . '" alt="avatar"> </span></a>';
                }

                $final[$key]['id'] = $value->id;
                $final[$key]['logo'] = $image;
                $final[$key]['name'] = '<a data-id="' . $value->id . '" data-name="' . $value->name . '" title="' . trans('message.edit') . '" class="showStudioClick">
                    ' . $value->name . '</a>';
                $final[$key]['address'] = $value->address;
                $final[$key]['phone_no'] = $value->phone_no;
                $final[$key]['status'] = getStsHtml($value->is_active);
                $final[$key]['admin_count'] = '<a data-id="' . $value->id . '" class="showAgencyAdmin"><span class="task-cat cyan">' . trans('message.view_users') . '</span></a>';
                if (getAgencyAdminCount($value->id) == 0) {
                    $final[$key]['admin_count'] .= ' <a data-id="' . $value->id . '" class="showAgencyAdmin no-agency-icon" title="' . trans('message.no_admin') . '"><i class="material-icons">priority_high</i></a> ';
                }
                if (count($permission) > 0) {
                    $final[$key]['action'] = getActionHtml("Agency", $value->id, $permission);
                }
            }

            $response['iTotalDisplayRecords'] = count($total);
            $response['iTotalRecords'] = count($total);
            $response['sEcho'] = intval($request->get('sEcho'));
            $response['aaData'] = $final;
            return $response;
        }
    }

    /**
     * [getForm description]
     *
     * @return  [type]  [description]
     */
    public function getForm()
    {
        $response = [
            'success' => true,
            'html' => view($this->viewPath . 'form')->render(),
        ];

        return response()->json($response, 200);
    }

    /**
     * [save description]
     * @param  AgencyRequest $request [description]
     * @return [type]           [description]
     */
    public function save(AgencyRequest $request)
    {
        $logoName = null;
        if ($request->hasFile('logo')) {
            $logoPath = storage_path("app/public/agency_logo");
            makeDir($logoPath, true);
            $extension = $request->logo->getClientOriginalExtension();
            $logoName = getUniqueFileName() . "." . $extension;
            $request->logo->move($logoPath, $logoName);
        }

        $agency = new Agency();
        $agency->name = $request->name;
        $agency->email = isset($request->email) ? $request->email : null;
        $agency->address = isset($request->address) ? $request->address : null;
        $agency->city = isset($request->city) ? $request->city : null;
        $agency->state = isset($request->state) ? $request->state : null;
        $agency->country = isset($request->country) ? $request->country : null;
        $agency->pin_code = isset($request->pin_code) ? $request->pin_code : null;
        $agency->phone_no = isset($request->phone_no) ? $request->phone_no : null;
        $agency->is_active = isset($request->is_active) ? $request->is_active : "0";
        $agency->over_by_user_id = $this->userId;
        $agency->logo = $logoName;
        $agency->save();

        $response = [
            'success' => true,
            'message' => trans('message.save_successfully'),
        ];

        return response()->json($response, 200);
    }

    /**
     * [edit description]
     *
     * @param  [type]  $agencyId  [description]
     * @return  [type]  [description]
     */
    public function edit($agencyId)
    {
        $agency = Agency::where('id', $agencyId)->first();

        $response = [
            'success' => true,
            'html' => view($this->viewPath . 'form', compact('agency'))->render(),
        ];

        return response()->json($response, 200);
    }

    /**
     * [update description]
     *
     * @param  AgencyRequest  $request   [description]
     * @param  [type]   $agencyId  [description]
     * @return  [type]   [description]
     */
    public function update(AgencyRequest $request, $agencyId)
    {
        $agency = Agency::find($agencyId);
        $agency->name = $request->name;
        $agency->email = isset($request->email) ? $request->email : null;
        $agency->address = isset($request->address) ? $request->address : null;
        $agency->city = isset($request->city) ? $request->city : null;
        $agency->state = isset($request->state) ? $request->state : null;
        $agency->country = isset($request->country) ? $request->country : null;
        $agency->pin_code = isset($request->pin_code) ? $request->pin_code : null;
        $agency->phone_no = isset($request->phone_no) ? $request->phone_no : null;
        $agency->is_active = isset($request->is_active) ? $request->is_active : "0";

        if ($request->hasFile("logo")) {
            $logoPath = storage_path("app/public/agency_logo");
            makeDir($logoPath, true);
            if ($agency->logo != "") {
                removeFile($logoPath . "/" . basename($agency->logo));
            }
            $logoName = getUniqueFileName() . "." . $request->logo->getClientOriginalExtension();
            $request->logo->move($logoPath, $logoName);
            $agency->logo = $logoName;
        }
        $agency->save();

        $response = [
            'success' => true,
            'message' => trans('message.update_successfully'),
        ];

        return response()->json($response, 200);
    }

    /**
     * [delete description]
     *
     * @param  [type]  $agencyId  [description]
     * @return  [type]  [description]
     */
    public function delete($agencyId)
    {
        $agency = Agency::find($agencyId);
        if ($agency) {
            $agency->delete();
        }

        $response = [
            'success' => true,
            'message' => trans('message.delete_successfully'),
        ];

        return response()->json($response, 200);
    }

    /**
     * [status description]
     *
     * @param  [type]  $agencyId  [description]
     * @return  [type]  [description]
     */
    public function status($agencyId)
    {
        $agency = Agency::find($agencyId);
        if ($agency) {
            $status = ($agency->is_active == "0") ? "1" : "0";
            $agency->is_active = $status;
            $agency->save();
        }

        $response = [
            'success' => true,
            'message' => trans('message.update_successfully'),
        ];

        return response()->json($response, 200);
    }
}
