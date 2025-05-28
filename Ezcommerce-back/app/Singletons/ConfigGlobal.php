<?php
namespace App\Singletons;

class ConfigGlobal
{
    private static $instance = null;
    public $moeda = 'BRL';
    public $idioma = 'pt-BR';

    private function __construct() {}

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new ConfigGlobal();
        }
        return self::$instance;
    }
}
?>