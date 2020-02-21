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

use function print_r;

class ExampleClass
{
    private $datetime;

    public function __construct()
    {
        $datetime = new DateTime();

        $this->datetime = $datetime;
    }

    public function someMethod(bool $var1, bool $var2): void
    {
        // Value needs to be an array.
        if (! $var1) {
            print_r($this->datetime);
        }
    }

    public function someMethod2(bool $var1, bool $var2): void
    {
        $array = [
            'aaa1' => 1,
            'aaa1' => 2,
        ];
    }

    public function someMethod3(string $var1, string $var2): void
    {
        $str = \str_replace('a', $var2, $var1);

        $str_asd = 1;
    }

    public function someMethod4(string $var1, string $var2): void
    {
        $str = $var1{1};
    }

    public function someMethod5(string $var1, string $var2): void
    {
        $str = $var1 .
            ' asd asd';
    }

    public function someMethod6(bool $var1, bool $var2): void
    {
        if (
            $var1 &&
            $var2
        ) {
            echo 'zzzz';
        }
    }

    public function someMethod7(string $var1, bool $var2): void
    {
        switch ($var1) {
            default:
                echo 'aaa';
                break;

            case 'zzzz':
                echo 'zzzz';
                break;
        }
    }
}
