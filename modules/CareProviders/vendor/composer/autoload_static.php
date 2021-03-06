<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit64e6de1f50a339df1f7a8cceb8b3b111
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Modules\\CareProviders\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Modules\\CareProviders\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Modules\\CareProviders\\Entities\\CountyDetails' => __DIR__ . '/../..' . '/Entities/CountyDetails.php',
        'Modules\\CareProviders\\Entities\\ProviderDetails' => __DIR__ . '/../..' . '/Entities/ProviderDetails.php',
        'Modules\\CareProviders\\Entities\\ProviderTypes' => __DIR__ . '/../..' . '/Entities/ProviderTypes.php',
        'Modules\\CareProviders\\Entities\\RatingDetails' => __DIR__ . '/../..' . '/Entities/RatingDetails.php',
        'Modules\\CareProviders\\Http\\Controllers\\CareProvidersController' => __DIR__ . '/../..' . '/Http/Controllers/CareProvidersController.php',
        'Modules\\CareProviders\\Providers\\CareProvidersServiceProvider' => __DIR__ . '/../..' . '/Providers/CareProvidersServiceProvider.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit64e6de1f50a339df1f7a8cceb8b3b111::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit64e6de1f50a339df1f7a8cceb8b3b111::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit64e6de1f50a339df1f7a8cceb8b3b111::$classMap;

        }, null, ClassLoader::class);
    }
}
