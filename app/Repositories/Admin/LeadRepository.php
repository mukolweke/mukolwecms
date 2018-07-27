<?php
/**
 * Created by PhpStorm.
 * User: molukaka
 * Date: 26/07/2018
 * Time: 16:37
 */

namespace App\Repositories\Admin;

use App\Lead;

class LeadRepository
{

    // get all leads
    public function getAll()
    {

//      dd( Lead::with('financialAdvisor')->get());

        return Lead::with('financialAdvisor')->get()->map(function ($lead){
            return[
                'id'=>$lead->id,
                'name' =>$lead->name,
                'source' =>$lead->source,
                'assigned'=>$lead->financialAdvisor->name,
                'description' =>$lead->description,
                'created_at' =>$lead->created_at->toFormattedDateString(),
            ];
        });
    }

    // create lead
    public function createLead($request)
    {
        return Lead::create($request->all());
    }

    // get a lead
    public function getLead($id)
    {
       return Lead::findOrFail($id);
    }

    // update a lead
    public function updateLead($request, $id)
    {
        $lead = Lead::findOrFail($id)
            ->update($request->all());

        return $lead;
    }

    // delete lead
    public function deleteLead($id)
    {
        return Lead::findOrFail($id)
            ->delete();
    }

}