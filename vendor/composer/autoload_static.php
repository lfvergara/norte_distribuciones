<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit79979063071efcddbe9f81e81680667f
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Com\\Tecnick\\Color\\' => 18,
            'Com\\Tecnick\\Barcode\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Com\\Tecnick\\Color\\' => 
        array (
            0 => __DIR__ . '/..' . '/tecnickcom/tc-lib-color/src',
        ),
        'Com\\Tecnick\\Barcode\\' => 
        array (
            0 => __DIR__ . '/..' . '/tecnickcom/tc-lib-barcode/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit79979063071efcddbe9f81e81680667f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit79979063071efcddbe9f81e81680667f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit79979063071efcddbe9f81e81680667f::$classMap;

        }, null, ClassLoader::class);
    }
}
