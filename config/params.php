<?php



$whitelist = array(
    '127.0.0.1',
    '::1',
);

if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
    return [
        'adminEmail' => 'support@youarearich.org',
        'siteUrl'=> '',
    ];
}else{
        return [
        'adminEmail' => 'support@youarearich.org',
        'siteUrl'=> 'http://oopsiambroke.com/web',
    ];
}
   




