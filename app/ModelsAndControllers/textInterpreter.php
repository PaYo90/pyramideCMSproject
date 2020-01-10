<?php


namespace Aplikacja;


class textInterpreter
{
    public static function parse($text){
        $formatText = trim($text);
        //$string = nl2br($trimed);

            //Catch all links with protocol
            $reg = '/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,}(\/\S*)?/';
            $formatText = preg_replace($reg, '<a href="$0" style="font-weight: normal;" target="_blank" title="$0">$0</a>', $formatText);

            //Catch all links without protocol
            $reg2 = '/(?<=\s|\A)www\.([0-9a-zA-Z\-\.]+\.[a-zA-Z0-9\/]{2,})(?=\s|$|\,|\.)/';
            $formatText = preg_replace($reg2, '<a href="//$0" style="font-weight: normal;" target="_blank" title="$0">$0</a>', $formatText);

            //Catch all emails
            $emailRegex = '/(\S+\@\S+\.\S+)/';
            $formatText = preg_replace($emailRegex, '<a href="mailto:$1" style="font-weight: normal;" target="_blank" title="$1">$1</a>', $formatText);
            $formatText = nl2br($formatText);

            //$formatText = textInterpreter::bbCode($formatText); - ustawic to przy wczytywaniu modelu do widoku;

        return $formatText;
    }

    public static function bbCode($text){
        $patterns = array();
        $patterns[0] = '%(\[b\])(.*)(\[\/b\])%is';
        $patterns[1] = '%(\[u\])(.*)(\[\/u\])%is';
        $patterns[2] = '%(\[i\])(.*)(\[\/i\])%is';
        $patterns[3] = '%(\[color=|\[color:) ?(#[0-9a-f]{6}|WHITE|SILVER|GRAY|BLACK|RED|MAROON|YELLOW|OLIVE|LIME|GREEN|AQUA|TEAL|BLUE|NAVY|FUCHSIA|PURPLE)(\])(.*)(\[\/color\])%is';
        $patterns[4] = '%(\[center\])(.*)(\[\/center\])%is';

        $replacement = array();
        $replacement[0] = "<b>$2</b>";
        $replacement[1] = "<u>$2</u>";
        $replacement[2] = "<i>$2</i>";
        $replacement[3] = "<span style='color:$2'>$4</span>";
        $replacement[4] = "<p class='text-center'>$2</p>";

        return preg_replace($patterns, $replacement, $text);
    }
}