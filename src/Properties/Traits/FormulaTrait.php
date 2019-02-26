<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Properties;


trait FormulaTrait
{
    /** @var bool  */
    protected $isFormula = false;
    /**
     * @var string
     */
    protected $formula = '';

    /**
     * @return bool
     */
    public function isFormula(): bool
    {
        return $this->isFormula;
    }

    /**
     * @param bool $isFormula
     * @return mixed
     */
    public function setIsFormula(bool $isFormula)
    {
        $this->isFormula = $isFormula;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormula(): string
    {
        return $this->formula;
    }

    /**
     * @param string $formula
     * @return mixed
     */
    public function setFormula(string $formula)
    {
        $this->formula = $formula;
        return $this;
    }


}