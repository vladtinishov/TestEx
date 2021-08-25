<?php

/**
 * Класс для создания запросов к API
 * @param String $url ссылка
 * @param String $apiKey ключ api
 */
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

    /**
     * Обёртка для curl
     * @param Array $params параметры запроса
     * @return Array
     */
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

        if ($result) return json_decode($result);
        throw new Exception("Запрос завершился с ошибкой");
    }
}