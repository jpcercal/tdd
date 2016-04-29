# Cekurte\TDD

[![Build Status](https://img.shields.io/travis/cekurte/tdd/master.svg?style=square)](http://travis-ci.org/cekurte/tdd)
[![Code Climate](https://codeclimate.com/github/jpcercal/cekurte-tdd/badges/gpa.svg)](https://codeclimate.com/github/jpcercal/cekurte-tdd)
[![Coverage Status](https://coveralls.io/repos/github/cekurte/tdd/badge.svg?branch=master)](https://coveralls.io/github/cekurte/tdd?branch=master)
[![Latest Stable Version](https://img.shields.io/packagist/v/cekurte/tdd.svg?style=square)](https://packagist.org/packages/cekurte/tdd)
[![License](https://img.shields.io/packagist/l/cekurte/tdd.svg?style=square)](https://packagist.org/packages/cekurte/tdd)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/26db2ab3-e452-4267-9742-2e0cac04f765/mini.png)](https://insight.sensiolabs.com/projects/26db2ab3-e452-4267-9742-2e0cac04f765)

- Just a simple extension to the PHPUnit library.
- Currently this package contains only support for one TestCase scenario [ReflectionTestCase](https://github.com/jpcercal/cekurte-tdd/blob/master/src/ReflectionTestCase.php) **contribute with this project**!

## Installation

- The package is available on [Packagist](http://packagist.org/packages/cekurte/tdd).
- The source files is [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) compatible.
- Autoloading is [PSR-4](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md) compatible.

```shell
composer require cekurte/tdd
```

**If you liked of this library, give me a *star =)*.**

## Documentation

This library was created to permit that developers write php unit tests using a common base class, including initially the following tasks:

- Set a private, protected or public property value;
- Get a private, protected or public property value;
- Call a private, protected or public method.

### Setting a property value

To set a property value (independently of your visibility) you can use the method [ReflectionTestCase::propertySetValue](https://github.com/cekurte/tdd/blob/master/src/ReflectionTestCase.php#L34) like the following example:

```php
<?php

namespace Your\Namespace;

use Cekurte\Tdd\ReflectionTestCase;

class YourClassTest extends ReflectionTestCase
{
    public function testAnything()
    {
        // Instance of a class that has one
        // private property named "yourPrivateProperty".
        $instance = new YourClass();

        // Set the value "newValue" to the property
        // "yourPrivateProperty".
        $this->propertySetValue(
            $instance,
            'yourPrivateProperty',
            'newValue'
        );

        // ...
    }
}
```

### Getting a property value

To get a property value (independently of your visibility) you can use the method [ReflectionTestCase::propertyGetValue](https://github.com/cekurte/tdd/blob/master/src/ReflectionTestCase.php#L53) like the following example:

```php
<?php

namespace Your\Namespace;

use Cekurte\Tdd\ReflectionTestCase;

class YourClassTest extends ReflectionTestCase
{
    public function testAnything()
    {
        // Instance of a class that has one
        // private property named "yourPrivateProperty".
        $instance = new YourClass();

        // Get the value of the property
        // "yourPrivateProperty".
        $currentValue = $this->propertyGetValue(
            $instance,
            'yourPrivateProperty'
        );

        // ...
    }
}
```

### Calling a method

To call a method (independently of your visibility) you can use the method [ReflectionTestCase::invokeMethod](https://github.com/cekurte/tdd/blob/master/src/ReflectionTestCase.php#L16) like the following example:

```php
<?php

namespace Your\Namespace;

use Cekurte\Tdd\ReflectionTestCase;

class YourClassTest extends ReflectionTestCase
{
    public function testAnything()
    {
        // Instance of a class that has one
        // private property named "yourPrivateMethod".
        $instance = new YourClass();

        // Call the method
        // "yourPrivateMethod".
        $valueReturned = $this->invokeMethod(
            $instance,
            'yourPrivateMethod',
            ['param1', 'param2', 'paramN']
        );

        // ...
    }
}
```

Contributing
------------

1. Give me a star **=)**
1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Make your changes
4. Run the tests, adding new ones for your own code if necessary (`vendor/bin/phpunit`)
5. Commit your changes (`git commit -am 'Added some feature'`)
6. Push to the branch (`git push origin my-new-feature`)
7. Create new Pull Request
