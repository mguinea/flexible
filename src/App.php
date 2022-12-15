<?php

declare(strict_types=1);

namespace Flexible;

use Flexible\Clock\Clock;
use Flexible\Logger\Logger;
use League\Container\Container;
use Nyholm\Psr7\Factory\Psr17Factory;
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
		protected ContainerInterface $container,
		protected ResponseFactoryInterface $responseFactory,
		protected LoggerInterface $logger,
		protected ClockInterface $clock
	) {
	}

	public static function create(
		?ContainerInterface $container = null,
		?ResponseFactoryInterface $responseFactory = null,
		?LoggerInterface $logger = null,
		?ClockInterface $clock = null
	): self
	{
		return new self(
			$container ?? new Container(),
			$responseFactory ?? new Psr17Factory(),
			$logger ?? new Logger(),
			$clock ?? new Clock()
		);
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
