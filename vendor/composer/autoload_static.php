<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8b831c3db88f4e107a3a128f25009776
{
    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slug' => 
            array (
                0 => __DIR__ . '/..' . '/kevinlebrun/slug.php/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit8b831c3db88f4e107a3a128f25009776::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
