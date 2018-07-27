<?php

namespace App\Http\Controllers;

use App\Client;
use App\Repositories\Advisor\ClientWebRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientWebController extends Controller
{
    protected $client_web_repo;
    protected $mail;

    public function __construct(ClientWebRepository $client_web_repo, EmailController $mail)
    {
        $this->client_web_repo = $client_web_repo;
        $this->mail = $mail;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->client_web_repo->getAllClients();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $all_clients = $this->client_web_repo->getAllMyClients(session()->get('user_id'));

        $client = $this->client_web_repo->createClient($request);


        $this->mail->sendClientConfirmEmail($request);

        session()->put('success', "Client Created Successfully");


        return view('advisor.view_create_clients', compact('all_clients'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
