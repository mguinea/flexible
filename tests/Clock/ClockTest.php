<?php

declare(strict_types=1);

namespace FlexibleTests\Clock;

use DateTime;
use DateTimeImmutable;
use Flexible\Clock\Clock;
use PHPUnit\Framework\TestCase;

final class ClockTest extends TestCase
{
	public function testRetrieveNow(): void
	{
		$timestamp = 1272509157;

		$date = new DateTime();
		$date->setTimestamp($timestamp);

		$stub = $this->createMock(Clock::class);
		$stub->method('now')
			->willReturn(DateTimeImmutable::createFromMutable($date));

		$this->assertEquals(1272509157, $stub->now()->getTimestamp());
	}
}
