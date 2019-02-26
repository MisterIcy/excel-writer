<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Handlers;

use MisterIcy\ExcelWriter\Generator\GeneratorInterface;

/**
 * Interface HandlerInterface
 * @package MisterIcy\ExcelWriter\Handlers
 */
interface HandlerInterface
{
    /**
     * @param HandlerInterface $handler
     * @return HandlerInterface
     */
    public function setNext(HandlerInterface $handler) : HandlerInterface;

    /**
     * @param GeneratorInterface $generator
     * @return mixed
     */
    public function handle(GeneratorInterface $generator);
}
