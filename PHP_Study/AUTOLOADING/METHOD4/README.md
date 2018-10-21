This is an effort to improve autoload using composer.
Configure composer.json.
But this time by using namespace. 

Adding namespace to each class is a work.
When using the namespaced class requires 'use' statement.
However, when a project gets really big, this will make things a lot organized.

├── README.md
├── app
│   ├── Codecourse
│   │   ├── Filters
│   │   │   └── Filters.php
│   │   └── Repositories
│   │       └── UserRepository.php
│   └── start.php
├── composer.json
├── index.php
└── vendor
    ├── autoload.php
    └── composer
        ├── ClassLoader.php
        ├── LICENSE
        ├── autoload_classmap.php
        ├── autoload_namespaces.php
        ├── autoload_psr4.php
        ├── autoload_real.php
        └── autoload_static.php

psr-4 method takes care of the situation where a new file directory
is created underneath Codecourse.  There is no need to append or modify.

Important note: composer.json must reside at the root of the project directory.
In this case the project directory is METHOD4.

In composer.json, "Codecourse" : "app/Codecourse" has a meaning.
"Codecourse" is namespace and it maps to the file structure of "app/Codecourse".
