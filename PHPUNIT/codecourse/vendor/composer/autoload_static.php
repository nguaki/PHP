<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfe69478b05113b30fc6d9ba1c8b6936c
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfe69478b05113b30fc6d9ba1c8b6936c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfe69478b05113b30fc6d9ba1c8b6936c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
