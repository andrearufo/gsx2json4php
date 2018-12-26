<?php

namespace AndreaRufo;

class Gsx2Json4Php{

    private $id;
    private $sheet;

    function __construct($id){
        $this->id = $id;
        $this->setSheet();
        $this->setUrl();
        $this->getJson();
    }

    function setUrl(){
        $this->url = 'https://spreadsheets.google.com/feeds/list/'.$this->getId().'/'.$this->getSheet().'/public/values?alt=json';
    }

    function setSheet($sheet = 1){
        $this->sheet = $sheet;
        return;
    }

    function getId(){
        return $this->id;
    }

    function getSheet(){
        return $this->sheet;
    }

    function getUrl(){
        return $this->url;
    }

    public function getJson(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $this->getUrl());

        if( $response->getStatusCode() != 200 ){
            return false;
        }

        $body = json_decode($response->getBody()->getContents());

        $return = [
            'columns' => [],
            'rows' => []
        ];

        foreach($body->feed->entry as $entry){

            $newrow = [];

            foreach($entry as $name => $row){
                if( substr($name, 0, 4) == 'gsx$' ){
                    $key = substr($name, 4);
                    $value = $row->{'$t'};

                    // row
                    $newrow[ $key ] = $value;

                    // column
                    $return['columns'][ $key ][] = $value;
                }
            }

            $return['rows'][] = $newrow;
        }

        return json_encode($return);
    }

}
