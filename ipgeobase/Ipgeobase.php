<?

class Ipgeobase
{
	public $charset = '';
	public $ip = '';

	public function __construct($ip = false, $charset = 'utf-8')
	{
		$this->ip      = $ip ? $ip : $this->getIP();
		$this->charset = $charset;

		foreach($this->getData() as $index => $value)
			$this->{$index} = $value;

		return $this;
	}

	function getData($ip = false)
	{
		$ip = $ip ? $ip : $this->ip;

		$url = 'ipgeobase.ru:7020/geo?ip='.$ip;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 3);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
		$string = curl_exec($ch);

		if($this->charset != 'windows-1251')
			$string = iconv('windows-1251', $this->charset, $string);

		return $this->parse_string($string);
	}

	function parse_string($string)
	{
		$patterns = array(
			'country'  => '/<country>(.*)<\/country>/iu',
			'city'     => '/<city>(.*)<\/city>/iu',
			'region'   => '/<region>(.*)<\/region>/iu',
			'district' => '/<district>(.*)<\/district>/iu',
			'lat'      => '/<lat>(.*)<\/lat>/iu',
			'lng'      => '/<lng>(.*)<\/lng>/iu',
		);

		$data = array();

		foreach($patterns as $key => $pattern)
		{
			preg_match($pattern, $string, $str);

			if(isset($str[1]))
				$data[$key] = trim($str[1]);
			else
				$data[$key] = '';
		}
		return $data;
	}

	function getIP()
	{
		$indexes = array('HTTP_CLIENT_IP', 'REMOTE_ADDR', 'HTTP_X_REAL_IP');
		$ips     = array();

		if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ips[] = trim(explode($_SERVER['HTTP_X_FORWARDED_FOR'], ', ', 1));

		foreach($indexes as $index)
		{
			if( ! isset($_SERVER[$index]))
				continue;

			$ips[] = $_SERVER[$index];
		}

		foreach($ips as $ip)
		{
			if( ! $this->isIP($ip))
				continue;

			return $ip;
		}
		return false;
	}

	function isIP($ip)
	{
		$pattern = "#^([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})$#";
		return preg_match($pattern, $ip) ? true : false;
	}
}