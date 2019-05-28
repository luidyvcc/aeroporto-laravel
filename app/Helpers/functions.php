<?php

use Illuminate\Support\Carbon;

function formatDate($value, $format = 'd/m/Y')
{
    return Carbon::parse($value)->format($format);
}

function formatTime($value, $format = 'H:i')
{
    return Carbon::parse($value)->format($format);
}

function formatPrice($value, $decimals = 2, $dec_point = ',', $thousands_sep = '.')
{
    return "R$ ".number_format($value,$decimals,$dec_point,$thousands_sep);
}

function getInfoAirport($value, $info = 'id')
{
    $dataAirport = explode(' - ',$value);
    $id = $dataAirport[0];
    $cityName = explode(' / ',$dataAirport[1])[0];
    $AirportName = explode(' / ',$dataAirport[1])[1];

    if ( $info == 'id' ) $return = $id;
    if ( $info == 'cityName' ) $return = $cityName;
    if ( $info == 'AirportName' ) $return = $AirportName;

    return $return;
}