This is an effort to improve autoload using composer.
Configure composer.json.


composer self-update    :  Updates the composer
                           Composer update failed: the "/home/ubunto/.composer/cache"
                           directory used to download the temp file could not be written.
                           
Error Message:
Cannot create cache directory /home/ubuntu/.composer/cache/repo/https---packagist.org/, or directory is not writable. Proceeding without cache
Cannot create cache directory /home/ubuntu/.composer/cache/files/, or directory is not writable. Proceeding without cache
Cannot create cache directory /home/ubuntu/.composer/cache/repo/https---packagist.org/, or directory is not writable. Proceeding without cache


composer dump-autoload -o

new tree structure

├── app
│   ├── models
│   │   └── User.php
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
        
        
Why I need to do composer dump-autoload -o each time I add a new class?