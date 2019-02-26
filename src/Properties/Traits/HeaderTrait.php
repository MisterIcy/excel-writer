<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Properties\Traits;

/**
 * Trait HeaderTrait
 * @package MisterIcy\ExcelWriter\Properties\Traits
 *
 * @author Alexandros Koutroulis <icyd3mon@gmail.com>
 * @license MIT
 */
trait HeaderTrait
{
    /**
     * Column's Header
     * @var string
     */
    protected $title = '';

    /**
     * Column's width
     * @var int
     */
    protected $width = 0;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return
     */
    public function setTitle(string $title) : self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return
     */
    public function setWidth(int $width) : self
    {
        $this->width = $width;
        return $this;
    }
}
