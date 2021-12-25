<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit492d5ab3d4c96b805aefaa39f121cd13
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Curl\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Curl\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-curl-class/php-curl-class/src/Curl',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit492d5ab3d4c96b805aefaa39f121cd13::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit492d5ab3d4c96b805aefaa39f121cd13::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit492d5ab3d4c96b805aefaa39f121cd13::$classMap;

        }, null, ClassLoader::class);
    }
}