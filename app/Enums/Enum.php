<?php


namespace App\Enums;

/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 19:04
 */
abstract class Enum
{
    final public function __construct($value = '')
    {
        $c = new ReflectionClass($this);

        if (empty($value)) {
            $this->value = array_values($c->getConstants());
            return;
        }

        if (!in_array($value, $c->getConstants())) {
            throw new EnumException("Illegal enum value used: $value");
        }
        $this->value = $value;
    }

    final public function __toString()
    {
        return $this->value;
    }
}
