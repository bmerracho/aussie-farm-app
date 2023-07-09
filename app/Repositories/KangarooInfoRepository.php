<?php

namespace App\Repositories;

use App\Models\KangarooInfoModel;

class KangarooInfoRepository
{
    private $oKangarooInfoModel;

    public function __construct(KangarooInfoModel $oKangarooInfoModel)
    {
        return $this->oKangarooInfoModel = $oKangarooInfoModel;
    }

    public function insertKangarooInfo($aData)
    {
        
        return $this->oKangarooInfoModel->create($aData);
    }

    public function readKangarooInfo()
    {
        return $this->oKangarooInfoModel
            ->orderBy('id')
            ->get();
    }

    public function readKangarooInfoById($iId)
    {
        return $this->oKangarooInfoModel->find($iId);
    }

    public function updateKangarooInfo($aData, $iId)
    {
        return $this->oKangarooInfoModel->where('id', $iId)
            ->update([
                'name' => $aData['name'],
                'nickname' => $aData['nickname'] ?? null,
                'weight' => $aData['weight'],
                'height' => $aData['height'],
                'gender' => $aData['gender'],
                'color' => $aData['color'] ?? null,
                'friendliness' => $aData['friendliness'] ?? null,
                'birthday' => $aData['birthday']
            ]);
     
    }

    public function deleteKangarooInfo($iId)
    {
        return $this->oKangarooInfoModel->where('id', $iId)
            ->delete();
    }
}