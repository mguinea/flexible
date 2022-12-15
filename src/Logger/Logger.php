<?php

declare(strict_types=1);

namespace Flexible\Logger;

use DateTimeZone;
use Psr\Log\LoggerInterface;

class Logger extends \Monolog\Logger implements LoggerInterface
{
	public function __construct(string $name = 'flexible-log', array $handlers = [], array $processors = [], ?DateTimeZone $timezone = null)
	{
		parent::__construct($name, $handlers, $processors, $timezone);
	}
}
