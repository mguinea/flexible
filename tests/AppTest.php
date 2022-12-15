<?php

declare(strict_types=1);

namespace FlexibleTests;

use Flexible\App;
use PHPUnit\Framework\TestCase;
use Psr\Clock\ClockInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Log\LoggerInterface;

final class AppTest extends TestCase
{
	private App $app;

	protected function setUp(): void
	{
		parent::setUp();

		$this->app = new App(
			$this->createMock(ContainerInterface::class),
			$this->createMock(ResponseFactoryInterface::class),
			$this->createMock(LoggerInterface::class),
			$this->createMock(ClockInterface::class)
		);
	}

	public function testGetters(): void
	{
		$this->assertInstanceOf(ContainerInterface::class, $this->app->container());
		$this->assertInstanceOf(LoggerInterface::class, $this->app->logger());
		$this->assertInstanceOf(ClockInterface::class, $this->app->clock());
	}

	public function testVersion(): void
	{
		$this->assertEquals('dev', App::VERSION);
	}
}
