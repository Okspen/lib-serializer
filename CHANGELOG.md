# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## 3.5.0
### Fixed
- Declared native `\Traversable` return type on `Result::getIterator()`, resolving the PHP 8.1
  tentative return type deprecation.
- `CamelCaseToSnakeCaseConverter::convert()` no longer passes `null` to `preg_replace()`,
  resolving a PHP 8.1 deprecation. Passing `null` still returns an empty string as before.

### Removed
- Dropped support for PHP 7.1, 7.2 and 7.3. Minimum supported version is now PHP 7.4.

### Changed
- **BC break:** any subclass of `Result` that overrides `getIterator()` must now declare a
  compatible return type (`\Traversable` or a subtype such as `\Iterator`).
- Replaced leading-backslash class references with `use` statements throughout the library —
  global classes (`ArrayIterator`, `ArrayObject`, `DateTime`, `DateTimeZone`, `Exception` and
  the SPL exceptions) and fully qualified `Paysera\...` references in docblocks. No behaviour
  change.

## 3.4.0
### Added
- PHP 8.4 support, removed implicitly nullable parameter declarations.

## 3.3.0
### Added
- Symfony 6 support.
- Added GitHub workflow

## 3.2.0
### Added
- Symfony 5 support.
### Changed
- Minor fixes

## 3.1.0
### Added
- Added PHP 8.0 support.

## 3.0.0
### Changed
- Dropped Symfony 2 support. Added Symfony 4 support. Now it supports versions 3 and 4.

### Fixed
- `PHPUnit\Framework\TestCase` implementation with new PHP Unit framework version.
- `setUp` method implementation.
- Use `expectEception` in `testMapToEntityThrowException` test.

### Added
- `.phpunit.result.cache` to `.gitignore` generated from the new version of PHP Unit.

### Removed
- `syntaxCheck` property from `phpunit.xml.dist` file.

## 2.1.0
### Added
- Added `ContextAwareDenormalizerInterface` which supports denormalization with optional `NormalizationContextInterface`
context entity.

## 2.0.0
### Removed
- Removed `Paysera\Component\Serializer\Exception\InvalidDataException` `setCodes` and `getCodes` methods,
  added `getViolations`, `setViolations` and `addViolation` instead.
