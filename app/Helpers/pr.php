<?php

namespace App\Helpers;

class pr {
    /**
     * @template T
     * @param T $value
     * @param  string | null $title
     *
     * @return T
     */
    public static function log($value, string | null $title = null) {
        info("-=-=-=-=--=- -=-=-=-=--=-{$title}-=-=-=-=--=- -=-=-=-=--=-");
        info(json_encode($value));
        return $value;
    }
    /**
     * @template T
     * @param T $value
     * @param  string | null $title
     *
     * @return T
     */
    public static function dump($value, string | null $title = null) {
        dump("-=-=-=-=--=- -=-=-=-=--=-{$title}-=-=-=-=--=- -=-=-=-=--=-");
        dump($value);
        return $value;
    }
}
