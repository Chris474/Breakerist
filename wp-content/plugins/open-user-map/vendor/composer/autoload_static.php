<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf76f349e765006d7adaa79762db6302e
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'OpenUserMapPlugin\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'OpenUserMapPlugin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf76f349e765006d7adaa79762db6302e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf76f349e765006d7adaa79762db6302e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf76f349e765006d7adaa79762db6302e::$classMap;

        }, null, ClassLoader::class);
    }
}
