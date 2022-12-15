<?php

declare(strict_types=1);

namespace FlexibleTests;

use Flexible\App;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

final class AppTest extends TestCase
{
	private App $app;

	protected function setUp(): void
	{
		parent::setUp();

		$this->app = new App(
			$this->createMock(ContainerInterface::class)
		);
	}

	public function testContainerResponse(): void
	{
		$this->assertInstanceOf(ContainerInterface::class, $this->app->container());
	}
}
