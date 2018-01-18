<?php
declare(strict_types = 1);

namespace App\Common\Domain\Exception;

final class NotFoundException extends \Exception
{
    protected $message = 'Requested data not found';
}
