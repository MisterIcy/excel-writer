<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Properties\Traits;

/**
 * Trait FormulaTrait
 * @package MisterIcy\ExcelWriter\Properties
 *
 * @author Alexandros Koutroulis <icyd3mon@gmail.com>
 * @license MIT
 */
trait FormulaTrait
{
    /**
     * @var bool
     */
    protected $isFormula = false;

    /**
     * Formula string.
     *
     * In order to be rendered, the formula must comply to PHPSpreadsheet's rules for formulas
     *
     * @example =CONCATENATE(A1,A2)
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
     * @return self
     */
    public function setIsFormula(bool $isFormula) : self
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
     * @return self
     */
    public function setFormula(string $formula) : self
    {
        $this->formula = $formula;
        return $this;
    }
}
