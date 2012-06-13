<?php
interface parser_functions
{
	function parse(array $data,$filename);
}
class parser implements parser_functions {
	private  $filename;
	private $content;
	public function parse(array $data,$filename)
	{
		$this->filename=$filename;
		ob_start();
		include $this->filename;
		$this->content=ob_get_contents();
		ob_end_clean();
		foreach ($data as $key => $value) {
			if(is_array($value))
			{
				$this->array_parse($key,$value);
			}
			else
			{
				$this->single_parse($key,$value);
			}
		}
		echo $this->content;
	}
	private function  array_parse($key,array $data)
	{
		$start = strpos($this->content, "{".$key."}");
		$end = strpos($this->content, "{/".$key."}");
		$sub_content = substr($this->content, $start + strlen("{".$key."}"),$end-$start - strlen("{/".$key."}"));
		$content="";
		$pass="";

		foreach ($data as  $value) {
			$pass=$sub_content;
			foreach ($value as $k => $val) {
				if(is_array($val))
				{
					//print_r($val);
				}
				else
				{
					$pass = str_replace("{".$k."}",  $val, $pass);
				}
			}
			$content.=$pass;
		}
		$this->content=str_replace($sub_content, $content, $this->content);
		$this->content=str_replace("{".$key."}", null, $this->content);
		$this->content=str_replace("{/".$key."}", null, $this->content);


	}
	private  function  single_parse($name,$value)
	{
		$this ->content= str_replace("{".$name."}", $value, $this->content);
	}
}