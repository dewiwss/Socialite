@extends('layouts.master')

@section('title','Cari Jurnal')

@section('nama_halaman','Cari Jurnal')

@section('content')

<?php

function GET_DATA_cURL($url, $token = null, $data = null, $pin = null){
    $header[] = "Host: api.elsevier.com";
    $header[] = "User-Agent: okhttp/3.12.1";
    $header[] = "Accept: application/json";
    $header[] = "Accept-Language: en-ID";
    $header[] = "Content-Type: application/json; charset=UTF-8";
    if ($pin):
    $header[] = "pin: $pin";
        endif;
    if ($token):
    $header[] = "X-ELS-APIKey: $token";
    endif;
    $c = curl_init("http://api.elsevier.com/content/search/scopus".$data);
        curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        // if ($data):
        // curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        // curl_setopt($c, CURLOPT_POST, true);
        // endif;
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_HEADER, true);
        curl_setopt($c, CURLOPT_HTTPHEADER, $header);
        $response = curl_exec($c);
        $httpcode = curl_getinfo($c);
        if (!$httpcode)
            return false;
        else {
            $header = substr($response, 0, curl_getinfo($c, CURLINFO_HEADER_SIZE));
            $body   = substr($response, curl_getinfo($c, CURLINFO_HEADER_SIZE));
        }
        $json = json_decode($body, true);
        return $json;
    }
    $keyword = isset($_GET['keyword'])?$_GET['keyword']:"";
    $data = GET_DATA_cURL("","706c898b0948885c5f082c477cb0972f","?count=10&query=$keyword");
?>




@endsection
