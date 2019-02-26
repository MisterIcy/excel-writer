<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Properties\Traits;

/**
 * Trait NullableTrait
 * @package MisterIcy\ExcelWriter\Properties\Traits
 */
trait NullableTrait
{
    /**
     * @var bool
     */
    protected $strict = false;

    /**
     * @var bool
     */
    protected $canBeNull = true;

    /**
     * @return bool
     */
    public function isStrict(): bool
    {
        return $this->strict;
    }

    /**
     * @param bool $strict
     * @return self
     */
    public function setStrict(bool $strict): self
    {
        $this->strict = $strict;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCanBeNull(): bool
    {
        return $this->canBeNull;
    }

    /**
     * @param bool $canBeNull
     * @return self
     */
    public function setCanBeNull(bool $canBeNull): self
    {
        $this->canBeNull = $canBeNull;
        return $this;
    }


}