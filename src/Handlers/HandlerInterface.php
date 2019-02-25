<?php


namespace MisterIcy\ExcelWriter\Handlers;


use MisterIcy\ExcelWriter\Generator\GeneratorInterface;

interface HandlerInterface
{
    function setNext(HandlerInterface $handler) : HandlerInterface;

    function handle(GeneratorInterface $generator) : HandlerInterface;

}