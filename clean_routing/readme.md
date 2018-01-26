# Basic clean url / routing in php     

we will make a array to file path. When user visit certain path we will require specific file for specific path.       

array of file path     

~~~php
$routes = [
  '' => 'all_file/index.php',
  'about' => 'all_file/about.php',
  'contact' => 'all_file/contact.php'
];
~~~

to get url path in php file we extract `REQUEST_URI` from `$_SERVER` super global. Trim `/` from request uri using php `trim` function. Thats actually sufficient for clean routing. But when we use get method in form we will have some parameter alongside url. So to get only url we are using `parse_url` function and giving 2nd parameter `PHP_URL_PATH`.    

~~~php
$path = trim( $_SERVER['REQUEST_URI'], '/' );
$path = parse_url($path, PHP_URL_PATH);
~~~

once we have path, we can require a `$routes` value by path index. Therefore, we have just checked whether this path available or not in our `$routes` array using `array_key_exists`. If path is found, we will require file, otherwise we will require not found page.  Thats all  

~~~php
if (array_key_exists($path, $routes) ) {
  require $routes[$path];
}else {
  require 'all_file/not_found_page.php';
}
~~~

Its working fine in my local php server. But in production we have to tweaking our server for clean url. So I have to make a `.htaccess` file. which is configuration file for apache web server. and put following content there

~~~
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} -s [OR]
RewriteCond %{REQUEST_FILENAME} -l [OR]
RewriteCond %{REQUEST_FILENAME} -d
RewriteRule ^.*$ - [NC,L]
RewriteRule ^.*$ index.php [NC,L]
~~~

I am shibu deb polo     
Happy coding. Take care. Please subscribe my channel      






