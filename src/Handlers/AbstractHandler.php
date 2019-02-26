<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Handlers;

use MisterIcy\ExcelWriter\Generator\GeneratorInterface;

/**
 * Class AbstractHandler
 * @package MisterIcy\ExcelWriter\Handlers
 */
abstract class AbstractHandler implements HandlerInterface
{
    /**
     * @var HandlerInterface
     */
    private $next;

    /**
     * @param HandlerInterface $handler
     * @return HandlerInterface
     */
    public function setNext(HandlerInterface $handler): HandlerInterface
    {
        $this->next = $handler;
        return $this->next;
    }

    /**
     * @param GeneratorInterface $generator
     * @return mixed|null
     */
    public function handle(GeneratorInterface $generator)
    {
        if (!is_null($this->next)) {
            return $this->next->handle($generator);
        }
        return null;
    }
}
