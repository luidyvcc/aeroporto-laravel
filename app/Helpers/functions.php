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

function getInfoAirport($value, $info = null)
{
    if (!isset($value) || $value==null) return null;

    $dataAirport1 = explode(' - ',$value);
    $airportId = $dataAirport1[0];
    
    $dataAirport2 = explode(' / ',$dataAirport1[1]);
    $cityName = $dataAirport2[0];
    $airportName = $dataAirport2[1];

    $dataFull = [
        'airportId' => $airportId,
        'cityName' => $cityName,
        'airportName' => $airportName,
    ];
    
    if ( $info == 'airportId' ) $return = $airportId;
    elseif ( $info == 'cityName' ) $return = $cityName;
    elseif ( $info == 'airportName' ) $return = $airportName;
    else $return = $dataFull;

    return $return;
}