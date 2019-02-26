# Changelog

## [Unreleased]

## [0.2]
### Added:
 - DateTimeTrait::$nullAllowed : Allows the developer to specify null values or other objects and get null values
 - By default, $nullAllowed is true, to reduce checks.
 - Added functions to get an Excel Column (int/string) from a Property
 - Added custom column/row/property fetching in formulas
    - {row} returns the current row
    - {col} returns the current column
    - [propertyPath] returns the column where the propertyPath resides (its first occurrence)
    - Example: =[cost]{row} * [discount]{row} + [extraCost]{row} 
 
### Fixed:
 - Fixed CodeStyle Issues  

## [0.1]
 - Initial Version
 
[Unreleased]: https://github.com/mistericy/excel-writer/compare/0.2...HEAD
[0.2]: https://github.com/mistericy/excel-writer/compare/0.2...0.1
[0.1]: https://github.com/mistericy/excel-writer/compare/bb3225112943bc4300c93846cfee611f1b3b2fc8...0.1
