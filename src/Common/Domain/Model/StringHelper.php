<?php
declare(strict_types = 1);

namespace App\Common\Domain\Model;

final class StringHelper
{
    /**
     * Solves non multi byte ucfirst
     * http://php.net/manual/en/function.ucfirst.php
     */
    public static function mb_ucfirst(string $string): string
    {
        return mb_strtoupper(mb_substr($string, 0, 1)) . mb_substr($string, 1);
    }
}
