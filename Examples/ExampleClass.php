<?php
/*
 * This file is part of the PHP Code Style package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Examples;

use DateTime;

class ExampleClass
{
    private $datetime;

    public function __construct()
    {
        $datetime = new DateTime();

        $this->datetime = $datetime;
    }

    public function someMethod(bool $var1): void
    {
        if (!$var1) {
            var_dump($this->datetime);
        }
    }
}
