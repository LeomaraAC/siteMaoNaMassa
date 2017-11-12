<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitca8289ebbf67318c90d57cd200f3f259
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitca8289ebbf67318c90d57cd200f3f259::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitca8289ebbf67318c90d57cd200f3f259::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
