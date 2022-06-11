STRUCTURES of the project:

includes/config.php:
    contain all database configuration such as: username, host, password  AND also the APP_NAME

core/initialize.php:
    contain the definition of the project directory path AND also include post.php and category.php witch contain the API class
    /category.php:
        contain the category class with all category attributes and Methods (read, single_read, create, update, delete)
    /post.php:
        contain the post class with all category attributes and Methods (read, single_read, create, update, delete)

api/categories/*.php:
    All categories API controller and routes for the request methods (GET, POST, PUT, DELETE);
api/posts/*.php:
    All posts API controller and routes for the request methods (GET, POST, PUT, DELETE);

TO ACCESS ALL ENDPOINTS:
    http://the.url.or.domaine.name/api/categories/*.php
    http://the.url.or.domaine.name/api/posts/*.php

    example : http://localhost:8000/api/posts/read.php -> to get all recorded posts in the database