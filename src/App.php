<?php

declare(strict_types=1);

namespace Flexible;

use League\Container\Container;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class App implements RequestHandlerInterface
{
	public function __construct(
		private ContainerInterface $container,
		private ResponseFactoryInterface $responseFactory
	) {
	}

	public static function create(
		?ContainerInterface $container = null,
		?ResponseFactoryInterface $responseFactory = null
	): self
	{
		return new self(
			$container ?? new Container(),
			$responseFactory ?? new Psr17Factory()
		);
	}

	public function container(): ContainerInterface
	{
		return $this->container;
	}

	public function handle(ServerRequestInterface $request): ResponseInterface
	{
		return $this->responseFactory->createResponse();
	}
}
