<?php
/**
 * Created by PhpStorm.
 * User: jhonatan
 * Date: 29/09/17
 * Time: 02:28
 */

    $geo= array();
    $a = "Rua Paulo Guimarães, São Paulo - SP"; // Pega parâmetro
    $addr = str_replace(" ", "+", $a); // Substitui os espaços por + "Rua+Paulo+Guimarães,+São+Paulo+-+SP" conforme padrão 'maps.google.com'
    $address = utf8_encode($addr); // Codifica para UTF-8 para não dar 'pau' no envio do parâmetro

    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $address . '&sensor=false');
    $output = json_decode($geocode);
    $lat = $output->results[0]->geometry->location->lat;
    $long = $output->results[0]->geometry->location->lng;

    $geo['lat']=$lat;
    $geo['long']=$long;

echo "<pre> Latitude: ";
print_r($geo['lat']);
echo "<br /> Longitude: ";
print_r($geo['long']);
echo "<br /><br /> Resultado completo JSON: <br /><br />";
print_r($output);