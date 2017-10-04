Longish code style configurations
================================

This is a [PSR-2](http://www.php-fig.org/psr/psr-2/) standard based code style ruleset for [PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer)

PHP Code Sniffer
----------------

Configuration file: *longish.phpcs.xml*

### Usage

1. Link longman/php-code-style repo as composer dependency

    `$ composer require --dev longman/php-code-style:~1.0`

2. Extend provided configuration to adapt it to your project. For example: 
   
```xml
    <?xml version="1.0" encoding="UTF-8"?>
    <ruleset name="Project code style checker config">
        <rule ref="./vendor/longman/php-code-style/longish.phpcs.xml">
            <exclude name="PSR2.Classes.PropertyDeclaration.Underscore"/>
        </rule>
        <rule ref="PSR1.Classes.ClassDeclaration">
            <exclude-pattern>*/_stubs.php</exclude-pattern>
        </rule>
        <rule ref="Generic.CodeAnalysis.UnconditionalIfStatement.Found">
            <exclude-pattern>*/_stubs.php</exclude-pattern>
        </rule>
    </ruleset>
```

* This is a modified version of [Prezly Code Style](https://github.com/prezly/code-style)
