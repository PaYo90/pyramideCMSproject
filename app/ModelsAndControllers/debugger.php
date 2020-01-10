<?php

namespace Aplikacja;

//Nie przekazuj do debbugera var_dumpa tylko serialize() dla array albo print_r() dla variable
class Debugger{
	private $tresc;
	private $data;
	
	public function __construct($tresc, $data){
		$this->tresc = $tresc;
		$this->data = $data;
	}
	
	public function dodaj(){
		$logfile = fopen("log.txt", "a");
		$this->tresc = $this->data . ": " . $this->tresc . "\n";
		fwrite($logfile, $this->tresc);
	}
	
	
}