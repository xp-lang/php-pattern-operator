Pattern operator for PHP
========================

[![Build status on GitHub](https://github.com/xp-lang/php-pattern-operator/workflows/Tests/badge.svg)](https://github.com/xp-lang/php-pattern-operator/actions)
[![XP Framework Module](https://raw.githubusercontent.com/xp-framework/web/master/static/xp-framework-badge.png)](https://github.com/xp-framework/core)
[![BSD Licence](https://raw.githubusercontent.com/xp-framework/web/master/static/licence-bsd.png)](https://github.com/xp-framework/core/blob/master/LICENCE.md)
[![Requires PHP 7.0+](https://raw.githubusercontent.com/xp-framework/web/master/static/php-7_0plus.svg)](http://php.net/)
[![Supports PHP 8.0+](https://raw.githubusercontent.com/xp-framework/web/master/static/php-8_0plus.svg)](http://php.net/)
[![Latest Stable Version](https://poser.pugx.org/xp-lang/php-pattern-operator/version.png)](https://packagpatternt.org/packages/xp-lang/php-pattern-operator)

Plugin for the [XP Compiler](https://github.com/xp-framework/compiler/) which adds an `~` infix operator to the PHP language.

Examples
--------
The pattern operator treats the following expression as a regular expression and returns the matches it generates:

```php
if ($greeting ~ '/^H[ea]llo/') {
  // Matches!
}

if ($matches= $greeting ~ '/^H[ea]llo/') {
  // Work with $matches
}
```

The pattern is passed to [preg_match](https://www.php.net/preg_match), so the above is equivalent of writing the following:

```php
if (preg_match($greeting, '/^H[ea]llo/')) {
  // Matches!
}

if (preg_match($greeting, '/^H[ea]llo/', $matches)) {
  // Work with $matches
}
```

Installation
------------
After installing the XP Compiler into your project, also include this plugin.

```bash
$ composer require xp-framework/compiler
# ...

$ composer require xp-lang/php-pattern-operator
# ...
```

No further action is required.

See also
--------
* https://www.perltutorial.org/perl-regular-expression/
* https://stackoverflow.com/questions/19441521/bash-regex-operator
* https://github.com/kasei/SwiftRegex and https://github.com/johnno1962/SwiftRegex
* https://externals.io/message/4825 (PHP internals discussion, 2003)