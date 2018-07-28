<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\FinancialAdvisorWasCreated;
use App\FinancialAdvisor;
use App\Http\Controllers\EmailController;
use App\Repositories\Admin\FARepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;

class FAController extends Controller
{

    protected $fa_repo;
    protected $mail;

    public function __construct(FARepository $fa_repo, EmailController $mail)
    {
        $this->fa_repo = $fa_repo;
        $this->mail = $mail;
    }

    public function index()
    {
        return $this->fa_repo->getAllAdvisors();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $validator = $this->validate($request, [
            'email' => 'unique:financial_advisors|max:255',
        ]);

        $financial_advisor = $this->fa_repo->createAdvisor($request);


        $this->mail->sendConfirmEmail($request);


        return $financial_advisor;
    }


    public function show($id)
    {
        return FinancialAdvisor::findOrFail($id);
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        return $this->fa_repo->updateAdvisor($request, $id);
    }

    public function destroy($id)
    {
       $this->fa_repo->deleteAdvisor($id);
        return '';
    }
}
