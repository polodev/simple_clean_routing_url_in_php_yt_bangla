<?php
$path = trim( $_SERVER['REQUEST_URI'], '/' );
$path = parse_url($path, PHP_URL_PATH);

// if ($path === '/') {
//   require 'all_file/index.php';
// } else if ($path == '/about')  {
//   require 'all_file/about.php';
// } else if ($path == '/contact') {
//   require 'all_file/contact.php';
// } else {
//   require 'all_file/not_found_page.php';
// }

$routes = [
  '' => 'all_file/index.php',
  'about' => 'all_file/about.php',
  'contact' => 'all_file/contact.php'
];

if (array_key_exists($path, $routes) ) {
  require $routes[$path];
}else {
  require 'all_file/not_found_page.php';
}



