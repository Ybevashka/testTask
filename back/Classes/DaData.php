<?php
namespace MyClasses;
class DaData
{
    private $key;
    private $url = "https://suggestions.dadata.ru/suggestions/api/4_1/rs/findById/";

    public function __construct($key)
    {
        $this->key = $key;
    }
    public function findPartyByInn($inn){
        return $this->doRequest("party",$inn);
    }
    public function findBankByBik($bik){
        return $this->doRequest("bank",$bik);
    }

    private function doRequest($path,$query){
        $data = ['query' => $query];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->url.$path);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            json_encode($data));
        curl_setopt($ch,CURLOPT_HTTPHEADER,[
            "Content-type: application/json","Authorization: Token $this->key"
        ]);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close($ch);

       return $server_output;

    }
}