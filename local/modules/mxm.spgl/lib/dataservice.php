<?php
/*
 * SecurityPopulationGoodsLocation => Spgl
 */

namespace Mxm\Spgl;

use Bitrix\Main\SystemException;

abstract class DataService
{
    protected $service = null;

    /**
     * @param $service
     *
     * @throws SystemException
     */
    public function __construct($service)
    {
        if(empty($service)) {
            throw new SystemException("Parameter service required");
        }

        $this->service = $service;
    }

    /**
     *
     * @return string|null
     * @throw SystemException
    */
    protected function getDataFromExternalService()
    {
        $data = null;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->service);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        if(curl_exec($ch) === false) {
            throw new SystemException(curl_error($ch));
        }

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }
}