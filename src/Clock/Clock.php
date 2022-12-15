<?php

declare(strict_types=1);

namespace Flexible\Clock;

use DateTimeImmutable;
use Psr\Clock\ClockInterface;

class Clock implements ClockInterface
{
	public function now(): DateTimeImmutable
	{
		return new DateTimeImmutable('now');
	}
}
