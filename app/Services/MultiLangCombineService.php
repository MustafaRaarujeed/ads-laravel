<?php

namespace App\Services;

class MultiLangCombineService
{
    public function createCombineJson($english, $arabic)
    {
        $dataArray  = array($english, $arabic);
        $dataJson = json_encode($dataArray);
        return $dataJson;
    }
}