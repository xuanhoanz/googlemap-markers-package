<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb52677061306a65abd0a0e38ffe41365
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tu9\\Tu9GooglemapMarkers\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tu9\\Tu9GooglemapMarkers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb52677061306a65abd0a0e38ffe41365::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb52677061306a65abd0a0e38ffe41365::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb52677061306a65abd0a0e38ffe41365::$classMap;

        }, null, ClassLoader::class);
    }
}
