<?php

require_once __DIR__ . '/curl.php';

$url = 'http://127.0.0.1/wp-json/wp/v2/users/?per_page=100&page=1';

$response = get($url);
print_json($response);
