<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbf9066ab07cae047a6449c239386e9de
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'models\\' => 7,
        ),
        'l' => 
        array (
            'login\\' => 6,
        ),
        'd' => 
        array (
            'db\\' => 3,
        ),
        'c' => 
        array (
            'components\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/models',
        ),
        'login\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/components/login',
        ),
        'db\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/db',
        ),
        'components\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/components/register',
        ),
    );

    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/src',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'db\\ActiveRecord' => __DIR__ . '/../..' . '/src/db/ActiveRecord.php',
        'db\\MySQL' => __DIR__ . '/../..' . '/src/db/MySQL.php',
        'models\\Curso' => __DIR__ . '/../..' . '/src/models/Curso.php',
        'models\\Materia' => __DIR__ . '/../..' . '/src/models/Materia.php',
        'models\\MateriaCurso' => __DIR__ . '/../..' . '/src/models/MateriaCurso.php',
        'models\\Monitor' => __DIR__ . '/../..' . '/src/models/Monitor.php',
        'models\\Monitoria' => __DIR__ . '/../..' . '/src/models/Monitoria.php',
        'models\\PresencaMonitoria' => __DIR__ . '/../..' . '/src/models/PresencaMonitoria.php',
        'models\\Usuario' => __DIR__ . '/../..' . '/src/models/Usuario.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbf9066ab07cae047a6449c239386e9de::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbf9066ab07cae047a6449c239386e9de::$prefixDirsPsr4;
            $loader->fallbackDirsPsr4 = ComposerStaticInitbf9066ab07cae047a6449c239386e9de::$fallbackDirsPsr4;
            $loader->classMap = ComposerStaticInitbf9066ab07cae047a6449c239386e9de::$classMap;

        }, null, ClassLoader::class);
    }
}
