<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit61410b7301155d9629797daeae7477b9
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit61410b7301155d9629797daeae7477b9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit61410b7301155d9629797daeae7477b9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
