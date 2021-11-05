<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3ec800583081a9dce43bbdbb3c6772fe
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3ec800583081a9dce43bbdbb3c6772fe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3ec800583081a9dce43bbdbb3c6772fe::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3ec800583081a9dce43bbdbb3c6772fe::$classMap;

        }, null, ClassLoader::class);
    }
}
