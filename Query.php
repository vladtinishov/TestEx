<?php

class Query
{
    private $orderPost;

    public function __construct(String $url, String $apiKey = "")
    {
        $this->orderPost = $url . "?apiKey=" . $apiKey;
    }

    public function createQuery(Array $params)
    {
        try {
            $this->curl($params);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private function curl(Array $params)
    {
        $result = "";
        if ($curl = curl_init($this->orderPost)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
            curl_setopt($curl, CURLOPT_HTTPHEADER, ["Content-Type:application/json"]);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($curl);
            curl_close($curl);
        }

        if ($result) var_dump($result);
    }
}