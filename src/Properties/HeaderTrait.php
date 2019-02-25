<?php


namespace MisterIcy\ExcelWriter\Properties;


trait HeaderTrait
{
    /** @var string */
    protected $title = '';

    /** @var int */
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
    public function setTitle(string $title)
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
    public function setWidth(int $width)
    {
        $this->width = $width;
        return $this;
    }


}