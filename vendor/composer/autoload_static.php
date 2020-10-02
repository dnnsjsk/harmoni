<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit591ae8701d8dc15c92a04d5e754c2e99
{
    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Parsedown' => 
            array (
                0 => __DIR__ . '/..' . '/erusev/parsedown',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Parsedown' => __DIR__ . '/..' . '/erusev/parsedown/Parsedown.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit591ae8701d8dc15c92a04d5e754c2e99::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit591ae8701d8dc15c92a04d5e754c2e99::$classMap;

        }, null, ClassLoader::class);
    }
}
