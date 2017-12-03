<?php
function formatarEndereco($string){

    $string = html_entity_decode($string);
    $string = strip_tags($string);
    //
    $array = array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/",
        "/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/",
        "/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/");
    $string = preg_replace($array,explode(" ","a A e E i I o O u U n N"),$string);
    $string = str_replace(" ","+", $string);
    return $string;
}
function coordenadas($endereco){

    $endereco = formatarEndereco($endereco);
    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$endereco.'&sensor=false');
    $output= json_decode($geocode);
    if(!isset($output->results[0]->geometry->location->lat) &&!isset($output->results[0]->geometry->location->lng) )
        throw new Exception("Ocorreu um erro ao tentar salvar a Latitude e Longitude");
    else{
        $lat = $output->results[0]->geometry->location->lat;
        $long = $output->results[0]->geometry->location->lng;
        $retorno = array($lat, $long);
        return $retorno;
    }

}