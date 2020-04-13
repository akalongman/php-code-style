Longish code style configuration
================================

This is a [PSR-12](http://www.php-fig.org/psr/psr-12/) based code style ruleset for [PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer)

PHP Code Sniffer
----------------

Configuration file: *longish.phpcs.xml*

### Usage

1. Link longman/php-code-style repo as composer dependency

    `$ composer require --dev longman/php-code-style`

2. Extend provided configuration to adapt it to your project. 
For example, create custom `phpcs.xml` file and put: 
   
```xml
<?xml version="1.0" encoding="UTF-8"?>
<ruleset name="Project code style checker config" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="../vendor/squizlabs/php_codesniffer/phpcs.xsd">
    <rule ref="./vendor/longman/php-code-style/longish.phpcs.xml"/>
    
    <!-- Exclude stubs file for PSR1.Classes.ClassDeclaration rule -->
    <rule ref="PSR1.Classes.ClassDeclaration">
        <exclude-pattern>*/_stubs.php</exclude-pattern>
    </rule>
    
    <!-- Exclude stubs file for Generic.CodeAnalysis.UnconditionalIfStatement rule -->
    <rule ref="Generic.CodeAnalysis.UnconditionalIfStatement.Found">
        <exclude-pattern>*/_stubs.php</exclude-pattern>
    </rule>
</ruleset>
```

3. For Laravel you can directly include `laravel.phpcs.xml`:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<ruleset name="Project code style checker config" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="../vendor/squizlabs/php_codesniffer/phpcs.xsd">
    <rule ref="./vendor/longman/php-code-style/laravel.phpcs.xml" />

</ruleset>
```

Running check (Laravel example):

    vendor/bin/phpcs --standard=vendor/longman/php-code-style/laravel.phpcs.xml -spn --encoding=utf-8 --report-width=150 --colors --parallel=16 app/ config/ tests/

Running check with custom phpcs.xml:

    vendor/bin/phpcs --standard=phpcs.xml -spn --encoding=utf-8 --report-width=150 --colors --parallel=16 app/ config/ tests/
