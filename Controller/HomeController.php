<?php


use vendor\System\System;

class HomeController extends System
{
    public function index(){
        $this->render('home');
    }

    public function getLastData(){
        ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 6.0)');
        $data = file_get_contents("http://hothothot.dog/api/capteurs/");

        $sock = fsockopen("wss://ws.hothothot.dog",9502);


        $json['sensors'] = [];
        $data = json_decode($data);
//        var_dump($data->{'capteurs'});
        foreach ($data->{'capteurs'} as $capteur){
            array_push($json['sensors'], ["name"=>$capteur->{'Nom'}, "type"=>"temp", "current_value"=> $capteur->{'Valeur'}, "value_type"=>"°C", "last_update"=>$capteur->{"Timestamp"}, "id"=>$capteur->{'Nom'}]);
        }
        echo json_encode($json);

    }

}