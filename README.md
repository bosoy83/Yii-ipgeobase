Yii-ipgeobase
=============

ext.ipgeobase.Ipgeobase uses ipgeobase.ru (free webservice) to locate IP geo information on russian language

Usage
=============
copy ipgeobase folder to /protected/extensions/

    Yii::import('ext.ipgeobase.Ipgeobase');

    $ip      = false;    // or string 'xxx.xxx.xxx.xxx'
    $charset = 'utf-8';  // your server charset, default argument = 'utf-8'

    $geoip   = new Ipgeobase($ip, $charset);
    $geoip   = new Ipgeobase('192.168.1.1'); // ip = '192.168.1.1', charset = 'utf-8'

    // $geoip dump
    // header("Content-type: text/plain");print_r($geoip);exit();
    /*
      [charset]  => utf-8
      [ip]       => 109.254.49.10
      [country]  => UA
      [city]     => Донецк
      [region]   => Донецкая область
      [district] => Восточная Украина
      [lat]      => 48.002777
      [lng]      => 37.805279
    */
