<?php

use App\Models\Agency;

if (!function_exists('getAgency')) {
    /**
     * [getAgency description]
     *
     * @return  [type]  [description]
     */
    function getAgency()
    {
        return Agency::pluck("name", "id")->all();
    }
}

if (!function_exists('getAgencyFields')) {
    /**
     * [getAgencyFields description]
     *
     * @return  [type]  [description]
     */
    function getAgencyFields()
    {
        $fields = [
            trans('message.logo'),
            trans('message.name'),
            trans('message.address'),
            trans('message.phone'),
            trans('message.users_list'),
            trans('message.status'),
            trans('message.actions'),
        ];

        return array_combine(range(1, count($fields)), array_values($fields));
    }
}
