<?php

namespace App\Services;
use App\Repositories\KangarooInfoRepository;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;

class KangarooInfoService
{
    private $oKangarooInfoRepository;

    public function __construct(KangarooInfoRepository $oKangarooInfoRepository)
    {
        $this->oKangarooInfoRepository = $oKangarooInfoRepository;
    }

    public function createKangarooInfo(array $aData): Response
    {
        try {
            $aResponse = $this->oKangarooInfoRepository->insertKangarooInfo($aData);
            return response([
                'id' => $aResponse['id'],
                'message' => 'successfully created kangaroo info.'
            ], 201);
        } catch(QueryException $e) {
            return response(['error' => $e], 500);
        }
    }

    public function getKangarooInfo()
    {
        try {
            $aKangarooInfo = $this->oKangarooInfoRepository->readKangarooInfo();
            return response([
                'message' => 'successfully retrieved kangaroo info.',
                'data' => $aKangarooInfo ?? []
            ], 200);
        } catch(QueryException $e) {
            return response(['error' => $e], 500);
        }
    }

    public function getKangarooInfoById($iId)
    {
        try {
            $aKangarooInfo = $this->oKangarooInfoRepository->readKangarooInfoById($iId);
            return response([
                'message' => 'successfully retrieved kangaroo info.',
                'data' => $aKangarooInfo ?? []
            ], 200);
        } catch(QueryException $e) {
            return response(['error' => $e], 500);
        }
    }

    public function updateKangarooInfo(array $aData, $iId): Response
    {
        try {
            $iResult = $this->oKangarooInfoRepository->updateKangarooInfo($aData, $iId);
            if ($iResult === 0) {
                return response([
                    'message' => 'kangaroo does not exist'
                ], 404);
            }
            return response([
                'message' => 'successfully updated kangaroo info.'
            ], 200);
            
        } catch(QueryException $e) {
            return response(['error' => $e], 500);
        }
    }

    public function deleteKangarooInfo($iId)
    {
        try {
            $this->oKangarooInfoRepository->deleteKangarooInfo($iId);
            return response([
                'message' => 'successfully deleted kangaroo info.'
            ], 200);
        } catch(QueryException $e) {
            return response(['error' => $e], 500);
        }
    }

}
