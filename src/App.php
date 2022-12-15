<?php

declare(strict_types=1);

namespace Flexible;

use Psr\Clock\ClockInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Log\LoggerInterface;

class App implements RequestHandlerInterface
{
	public const VERSION = 'dev';

	public function __construct(
		private ContainerInterface $container,
		private ResponseFactoryInterface $responseFactory,
		private LoggerInterface $logger,
		private ClockInterface $clock
	) {
	}

	public function container(): ContainerInterface
	{
		return $this->container;
	}

	public function logger(): LoggerInterface
	{
		return $this->logger;
	}

	public function clock(): ClockInterface
	{
		return $this->clock;
	}

	public function handle(ServerRequestInterface $request): ResponseInterface
	{
		return $this->responseFactory->createResponse();
	}
}
