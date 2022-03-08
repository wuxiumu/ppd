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
Macaw::get('paginator/lists/(:num)', 'Controllers\PaginatorController@lists');
Macaw::post('temp/fileupload', 'Controllers\TempController@fileupload');
Macaw::get('temp/watermark', 'Controllers\TempController@watermark');

Macaw::dispatch();
