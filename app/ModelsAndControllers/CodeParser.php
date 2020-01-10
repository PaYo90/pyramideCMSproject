<?php


namespace Aplikacja;


class CodeParser
{
    public static function sting_code($code){
        $patterns = array();
        $patterns[0] = '%(@IF\(){1} *(.*)?(\))%im';
        $patterns[1] = '%@ENDIF%im';
        $patterns[2] = '%(@FOREACH){1} *(\(){1}(.*)?(\))%im';
        $patterns[3] = '%@ENDFOREACH%im';
        $patterns[4] = '%(@){1}(\$){1}([a-zA-Z_0-9\[\]\'\"\+]+)+([ ]*)([=]{1})?([ ]*)(new)?([ ]*)(\$)?([a-zA-Z_0-9:\(\)\\\$\_\[\]\'\"\.]+)*%m';
        $patterns[5] = '%{{2} *(\$)?([a-z+A-Z_0-9]+)(\[ *)?(\'|\")?( *[a-zA-Z_0-9\(\)]+ *)?(\'|\")?( *\])?( *\-\>[a-zA-Z0-9]*)? *}{2}%';
        $patterns[6] = '%(@ELSE){1}%im';
        $patterns[7] = '%(@ELSEIF\(){1} *(.*)?(\))%im';
        $patterns[8] = '%(@FOR\(){1} *(.*)?(\))%im';
        $patterns[9] = '%@ENDFOR%im';
        $patterns[10] = '%(@WHILE){1} *(\()(.*)?(\))%im';
        $patterns[11] = '%@ENDWHILE%im';
        $patterns[12] = '%@DOWHILE%im';
        $patterns[13] = '%(@ENDDOWHILE\(){1} *(.*)?(\))%im';
        $patterns[14] = '%@include *(\(){1}(.*)?(\)){1}%im';
        //for
        //while
        //do while
        //etc. switch, include, require


        $replacement = array();
        $replacement[0] = "<?php if($2) { ?>";
        $replacement[1] = "<?php } ?>";
        $replacement[2] = "<?php foreach($3) { ?>";
        $replacement[3] = "<?php } ?>";
        $replacement[4] = "<?php $1$2$3$4$5$6$7$8$9$10; ?>";
        $replacement[5] = "<?php echo $1$2$3$4$5$6$7$8; ?>";
        $replacement[6] = "<?php }else{ ?>";
        $replacement[7] = "<?php }elseif($2){ ?>";
        $replacement[8] = "<?php for($2) { ?>";
        $replacement[9] = "<?php } ?>";
        $replacement[10] = "<?php while($3) { ?>";
        $replacement[11] = "<?php } ?>";
        $replacement[12] = "<?php do{ ?>";
        $replacement[13] = "<?php }while($2) ?>";
        $replacement[14] = "<?php include ($2) ?>";


        return preg_replace($patterns, $replacement, $code);
        //nauka preg match
        /*
         * '@ @' - @ to dowolny powtorzony 2 razy znak oznaczajacy poczatek i koniec reg exp
         * '@^ $@' - ^ - znak poczatku stringa, $ znak konca stringa odwolujacy sie do poczatku i zakonczenia lancucha znkow
         * '@[a-z]@i' - i to dowolna wielkosc liter
         * '@[a-z]@iu' - u to utf8 czyli takze polski alfabet i jego litery
         * '@ @m' - wyszukuje takze w znakach nowej lini, inaczej tylko w jednej - pierwszej
         */




    }


}