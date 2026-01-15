<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\TransfereGovService;
use Illuminate\Http\Request;

class TransfereGov extends Controller
    {
    public function configIntegracao(TransfereGovService $service)
    {
        $endpoints = $service->endpointsDisponiveis();
        return view('admin.integracoes.config', compact('endpoints'));
    }

}