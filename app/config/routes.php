<?php

use NoahBuscher\Macaw\Macaw;

Macaw::error(function () {
  echo '404';
});

Macaw::get('/', 'Controllers\Demo@index');
Macaw::get('page', 'Controllers\Demo@page');
Macaw::get('view/(:num)', 'Controllers\Demo@view');
Macaw::get('temp/lists', 'Controllers\TempController@lists');
Macaw::get('temp/view/(:num)', 'Controllers\TempController@view');
Macaw::get('temp/edit/(:num)', 'Controllers\TempController@edit');
Macaw::post('temp/(:num)', 'Controllers\TempController@update');
Macaw::get('temp/add', 'Controllers\TempController@add');
Macaw::post('temp/add', 'Controllers\TempController@insert');
Macaw::get('temp/del/(:num)', 'Controllers\TempController@del');
Macaw::get('paginator/lists/(:num)', 'Controllers\PaginatorController@lists');
Macaw::post('temp/fileupload', 'Controllers\TempController@fileupload');
Macaw::get('temp/watermark', 'Controllers\TempController@watermark');
Macaw::get('captcha', 'Controllers\Demo@captcha');

Macaw::post('login', 'Controllers\Demo@login');
Macaw::get('articles', 'Controllers\Demo@articlesList');
Macaw::post('articles', 'Controllers\Demo@articlesInsert');
Macaw::get('articles/(:num)', 'Controllers\Demo@articlesView');
Macaw::put('articles/(:num)', 'Controllers\Demo@articlesUpdate');
Macaw::delete('articles/(:num)', 'Controllers\Demo@articlesDelete');

Macaw::get('tt', 'Controllers\Demo@tt');
Macaw::get('tts', 'Controllers\Demo@tts');
Macaw::dispatch();
