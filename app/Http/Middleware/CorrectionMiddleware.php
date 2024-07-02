<?php

namespace App\Http\Middleware;

use Hekmatinasser\Verta\Verta;
use Illuminate\Foundation\Http\Middleware\TransformsRequest;

class CorrectionMiddleware extends TransformsRequest
{
    protected $except = [
    ];

    protected $bools = ['is_ftf', 'is_normal','is_dependent','is_suspended'];

    /**
     * Transform the given value.
     *
     * @param mixed $key
     * @param mixed $value
     * @return mixed
     */
    protected function transform($key, $value)
    {
        if (in_array($key, $this->except, true) || is_null($value))
            return $value;

        if (is_string($value) && $value == "null")
            return null;

        $this->organizeNumbers($value);
        $this->organizeBool($key, $value);

        if ($key == "mobile" && substr($value, 0, 1) == "0") {
            $value = substr_replace($value, "+98", 0, 1);
        }

        return $value;
    }

    /**
     * @param mixed $value
     */
    protected function organizeNumbers(&$value): void
    {
        $value = (is_string($value) || is_numeric($value)) ? convertToEnNumber($value) : $value;
    }

    /**
     * @param mixed $key
     * @param mixed $value
     */
    protected function organizeDates(string $key, &$value): void
    {
        if (in_array($key, $this->dates, true)) {
            dd($value);
            $value = Verta::parseFormat('Y/m/d', $value)->formatGregorian('Y-m-d');
        }
    }

    /**
     * @param mixed $key
     * @param mixed $value
     */
    protected function organizeBool(string $key, &$value): void
    {
        if (in_array($key, $this->bools, true) && !is_bool($value)) {
            if ($value == "true")
                $value = true;
            elseif ($value == "false")
                $value = false;
            else
                $value = (bool)$value;
        }
    }
}
