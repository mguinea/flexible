<?php

declare(strict_types=1);

namespace Flexible;

use League\Container\Container;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class App implements RequestHandlerInterface
{
	public function __construct(
		private ContainerInterface $container
	) {
	}

	public static function create(
		?ContainerInterface $container = null
	): self
	{
		return new self(
			$container ?? new Container()
		);
	}

	public function container(): ContainerInterface
	{
		return $this->container;
	}

	public function handle(ServerRequestInterface $request): ResponseInterface
	{
		// TODO: Implement handle() method.
	}
}
