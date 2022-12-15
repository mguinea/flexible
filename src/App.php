<?php

declare(strict_types=1);

namespace Flexible;

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
		private LoggerInterface $logger
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

	public function handle(ServerRequestInterface $request): ResponseInterface
	{
		return $this->responseFactory->createResponse();
	}
}
