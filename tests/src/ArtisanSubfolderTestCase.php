<?php
/**
 * Created by PhpStorm.
 * User: laravel-russian
 * Date: 01/10/2019
 * Time: 11:15
 */

namespace LaravelRussian\Multidomain\Tests;

class ArtisanSubfolderTestCase extends ArtisanTestCase
{

    protected $laravelArtisanFile = 'artisan_sub';

    protected function setPaths() {
        $this->laravelAppPath = __DIR__ . '/../../vendor/orchestra/testbench-core/laravel';
        $this->laravelEnvPath = $this->laravelAppPath . DIRECTORY_SEPARATOR . 'envs';
    }

}