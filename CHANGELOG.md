# Changelog

## [Unreleased]
### Fixed
 - Spreadsheet objects can be passed to Writer's Generate, in order to be passed to generator.
## [0.3]
### Added:
 - Added NullableTrait that enables the library to be less strict, when searching for properties inside objects. By default we do not search strictly (instead of an Exception, ```null``` will be returned).   

### Fixed:
 - Fixed a bug in the reference DataHandler, where it seemed to skip certain formulas that didn't contain path parameters
 - Fixed a formatting bug in DataHandler.
 - Fixed a bug in DateTime Traits that returned 0 instead of null dates
  
### Removed:
 - Removed a debugging ```fwrite``` from MetadataHandler
 
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
 
[Unreleased]: https://github.com/mistericy/excel-writer/compare/0.3...HEAD
[0.3]: https://github.com/mistericy/excel-writer/compare/0.2...0.3
[0.2]: https://github.com/mistericy/excel-writer/compare/0.1...0.2
[0.1]: https://github.com/mistericy/excel-writer/compare/bb3225112943bc4300c93846cfee611f1b3b2fc8...0.1
