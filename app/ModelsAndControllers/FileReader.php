<?php


namespace Aplikacja;


class FileReader
{
    public static function read($file){
        $ofile = fopen($file, "r");
        $content = fread($ofile,filesize($file));
        fclose($ofile);
        return $content;
    }
}