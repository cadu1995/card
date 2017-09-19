<?php

if (!function_exists('to_datetime')) {

    function to_datetime($data) {

        $date = DateTime::createFromFormat('!d-m-Y', str_replace('/', '-', $data));
        return $date->format('Y-m-d H:i:s');
    }
}

if (!function_exists('TimestampParaDataSimples')) {

    function TimestampParaDataSimples($timestamp) {
        
        return date('d/m/Y', strtotime($timestamp));
    }
}