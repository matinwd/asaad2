<?php

namespace App\Utils;

trait JsonExtraField
{
    public function getExtraValue($name, $default = null)
    {
        return $this->options[$name] ?? $default;
    }

    public function setExtraValue($name, $value)
    {
        $options = $this->options;
        $options[$name] = $value;
        $this->options = $options;
    }
}
