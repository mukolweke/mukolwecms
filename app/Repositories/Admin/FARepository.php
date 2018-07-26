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

    public function getAllAdvisors()
    {
        return FinancialAdvisor::all();
    }

}