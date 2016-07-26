<?php

namespace Alloy\Facades;

use Uuid;
use Illuminate\Support\Facades\Facade;

class Run extends Facade {

    public static function makeName($name = null) {
        $output = Uuid::generate(4);

        if (!empty($name)) {
            $output = Uuid::generate(5, $name, Uuid::NS_DNS);
        }

        return $output = str_replace('-', '', $output);
    }

    public static function disk($disk) {

        if (empty($disk)) {
            return null;
        }

        return camel_case($disk);
    }

}
