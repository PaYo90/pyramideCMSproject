<?php

namespace Aplikacja;

//Nie przekazuj do debbugera var_dumpa tylko serialize() dla array albo print_r() dla variable
class Debug{
    public static function dodaj($tresc, $pokaz_entery=false){
        $logfile = fopen("log.txt", "a");
        if($pokaz_entery==false){
            $tresc = str_replace("\n", "", $tresc);
        }
        $tresc = date('d.m.Y H:i:s') . ": " . $tresc . "\n";
        fwrite($logfile, $tresc);
    }


}