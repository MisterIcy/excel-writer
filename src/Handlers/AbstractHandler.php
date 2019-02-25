<?php


namespace MisterIcy\ExcelWriter\Handlers;


use MisterIcy\ExcelWriter\Generator\GeneratorInterface;

abstract class AbstractHandler implements HandlerInterface
{
    /**
     * @var HandlerInterface
     */
    private $next;

    public function setNext(HandlerInterface $handler): HandlerInterface
    {
        $this->next = $handler;
    }

    public function handle(GeneratorInterface $generator): HandlerInterface
    {
        if (!is_null($this->next)) {
            return $this->next->handle($generator);
        }
        return $this;
    }
}