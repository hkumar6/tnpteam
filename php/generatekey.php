<?php
	function generateKey ($company_name)
	{
		$chars = str_split(strtolower($company_name));
		$key = '';
		foreach($chars as $char)
		{
			if( ctype_alnum($char) )
				$key = $key.$char;
		}
		return $key;
	}
?>