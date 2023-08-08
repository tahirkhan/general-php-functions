<?php
function get_request_param($name, $default_value=FALSE, $choices = FALSE)
{
	$name=trim($name);
	$value="";
	if(array_key_exists($name, $_GET))
	{
		$value=$_GET[$name];
	}
	if(array_key_exists($name, $_POST))
	{
		$value=$_POST[$name];
	}
	if(!is_array($value))
	{
		$value=trim($value);
	}
	if(!empty($choices)&&is_array($choices))
	{
		if(!in_array($value, $choices))
		{
			return $default_value;
		}
	}

	if(!empty($value))
	{
		if(!is_array($value))
		{
			return urldecode(urldecode($value));
		}
		else
		{
			return $value;
		}
		
	}
	return $default_value;
}

function get_boolean_request_param($name, $default_value=FALSE)
{

	$value = get_request_param($name,"NO_VALUE_FOUND");

	if($value=="NO_VALUE_FOUND")
	{
		return $default_value;
	}
	$value=strtoupper($value);
	if ($value=="YES"||$value=="Y"||$value=="TRUE"||$value=="1")
	{
		return TRUE;
	}
	if ($value=="No"||$value=="N"||$value=="FALSE"||$value=="0")
	{
		return FALSE;
	}
	return FALSE;
}
?>
