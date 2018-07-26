<?php
/**
 * Created by PhpStorm.
 * User: molukaka
 * Date: 26/07/2018
 * Time: 10:04
 */

namespace App\Repositories\Admin;


use App\FinancialAdvisor;

class FARepository
{
    public function __construct(){}

    // get all
    public function getAllAdvisors()
    {
        return FinancialAdvisor::all();
    }

    // create advisor
    public function createAdvisor()
    {

        $request_data = [
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'password' => bcrypt(request('password')),
            'fa_rank' => request('rank'),
            'activation_code' => request('activation_code'),
        ];

        return FinancialAdvisor::create($request_data);
    }


}