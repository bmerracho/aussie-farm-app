<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\KangarooInfoService;
use App\Http\Requests\KangarooStoreRequest;

class KangarooInfoController extends Controller
{
    private $oKangarooInfoService;

    public function __construct(KangarooInfoService $oKangarooInfoService)
    {
        $this->oKangarooInfoService = $oKangarooInfoService;
    }

    public function createKangarooInfo(KangarooStoreRequest $request)
    {
        return $this->oKangarooInfoService->createKangarooInfo($request->validated());  
    }

    public function updateKangarooInfo(KangarooStoreRequest $request)
    {
        return $this->oKangarooInfoService->updateKangarooInfo($request->validated(), $request->id);
    }

    public function deleteKangarooInfo(Request $request)
    {
        return $this->oKangarooInfoService->deleteKangarooInfo($request->id);
    }

    public function getKangarooInfo(Request $request)
    {
        return $this->oKangarooInfoService->getKangarooInfo();
    }

    public function getKangarooInfoById(Request $request)
    {
        return $this->oKangarooInfoService->getKangarooInfoById($request->id);
    }
}
