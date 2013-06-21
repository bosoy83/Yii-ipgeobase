Yii-ipgeobase
=============

ext.ipgeobase.Ipgeobase uses ipgeobase.ru (free webservice) to locate IP geo information on russian language

Usage
=============
copy ipgeobase folder to /protected/extensions/

    Yii::import('ext.ipgeobase.Ipgeobase');
    $geoip = new Ipgeobase('109.254.49.10', 'ISO-8859-1');
    
    $charset  = $geoip->charset;
    $ip       = $geoip->ip;
    $country  = $geoip->country;
    $city     = $geoip->city;
    $region   = $geoip->region;
    $district = $geoip->district;
    $lat      = $geoip->lat;
    $lng      = $geoip->lng;
    
    // or
    $geoip = new Ipgeobase(); // ip detected automatically, charset = 'utf-8'

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
