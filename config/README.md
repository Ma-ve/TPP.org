# Configuration

There are two parts to configuring TPP.org.

### 1. Run-specific config

The first one is `config.php`in this directory. This contains run-specific configuration, like database name and version. See `sample.config.php` for an example. 

`TWITCHVERSION` may be empty in this file, but if that is the case, then a server environment variable must be set. It must be named either `VERSION` OR `REDIRECT_VERSION`. Please see `models/Init.php`.

### 2. General config

The general `config.php` resides one level higher than this directory, outside the reach of the public domain, preferably. Please see `models/Init.php` for the exact location. You must create this file by hand. The default content is as follows:

    <?php
    return [
        "DB_DATABASE" => "twitchplayspokemon_", // The database prefix
        "IMG_PATH" => "/img", // Image path relative to the domain. May be an external CDN link
        "DB_HOST" => "localhost", // Database host
        "DB_USER" => "tppuser", // Database username
        "DB_PASS" => "tpppass", // Database password
        "TPP_CACHE_KEY" => "cachekey", // Cache key which can be used to refresh the contents, if caching is enabled
    ];
