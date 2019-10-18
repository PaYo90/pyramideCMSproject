<?php

namespace Aplikacja;

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