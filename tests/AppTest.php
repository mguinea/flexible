<?php

declare(strict_types=1);

namespace FlexibleTests;

use Flexible\App;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;

final class AppTest extends TestCase
{
	private App $app;

	protected function setUp(): void
	{
		parent::setUp();

		$this->app = new App(
			$this->createMock(ContainerInterface::class),
			$this->createMock(ResponseFactoryInterface::class)
		);
	}

	public function testContainerResponse(): void
	{
		$this->assertInstanceOf(ContainerInterface::class, $this->app->container());
	}

	public function testNamedFactory(): void
	{
		$app = App::create();

		$this->assertInstanceOf(App::class, $app);
		$this->assertInstanceOf(ContainerInterface::class, $app->container());
	}
}
