<?php

namespace App\Http\Controllers;

use App\AgentInvHeader;
use Illuminate\Http\Request;

class AgentInvHeaderController extends Controller
{
   
    public function index()
    {
        //
    }

    
    public function create(Request $req)
    {
        if($req->ajax()){

            

        }
    }

  
    public function store(Request $request)
    {
        //
    }

   
    public function show(AgentInvHeader $agentInvHeader)
    {
        //
    }

    public function edit(AgentInvHeader $agentInvHeader)
    {
        //
    }

  
    public function update(Request $request, AgentInvHeader $agentInvHeader)
    {
        //
    }

 
    public function destroy(AgentInvHeader $agentInvHeader)
    {
        //
    }
}
