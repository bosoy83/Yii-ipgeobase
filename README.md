Yii-ipgeobase
=============

ext.ipgeobase.Ipgeobase uses ipgeobase.ru (free webservice) to locate IP geo information on russian language

Usage
=============
copy ipgeobase folder to /protected/extensions/

    Yii::import('ext.ipgeobase.Ipgeobase');

    // ip detected automatically, charset = 'utf-8'
    $geoip   = new Ipgeobase();
    
    // ip = '109.254.49.10', charset = 'ISO-8859-1'
    $geoip   = new Ipgeobase('109.254.49.10', 'ISO-8859-1');

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
