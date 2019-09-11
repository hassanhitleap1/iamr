<?php



$whitelist = array(
    '127.0.0.1',
    '::1',
    'localhost:8080',
);

if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
    return [
        'adminEmail' => 'support@youarearich.org',
        'siteUrl'=> 'localhost:8080/web',
    ];
}else{
        return [
        'adminEmail' => 'support@youarearich.org',
        'siteUrl'=> 'http://oopsiambroke.com/web',
    ];
}
   




