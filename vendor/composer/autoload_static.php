<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite7c0e6c3fe18be30a2f611cb40cc8220
{
    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'User\\Webbylab\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'User\\Webbylab\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite7c0e6c3fe18be30a2f611cb40cc8220::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite7c0e6c3fe18be30a2f611cb40cc8220::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
