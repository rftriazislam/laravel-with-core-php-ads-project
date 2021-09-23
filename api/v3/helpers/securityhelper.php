<?php

class SecurityHelper
{
	protected $secret = "Dreamploy17";
	protected $did;
	protected $timemap;
	protected $value;
	
	function __construct( $timemap, $value, $did )
	{
		$this->did = $did;
		$this->timemap = $timemap;
		$this->value = $value;
	}

	function securityChecker()
	{
		// Generate token
		$md5 = md5($this->did.$this->secret.$this->timemap, true);

		$md5 = base64_encode($md5);
		$md5 = strtr($md5, '+/', '-_');
		$md5 = str_replace('=', '', $md5);  

		if( hash_equals($md5, $this->value) )
			return true;
		else
			return false;
	}
}