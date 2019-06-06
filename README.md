AjglSwiftmailerMailer
=====================

The AjglSwiftmailerMailer is a Swift Mailer bridge for Symfony Mailer.


Installation
------------

To install the latest stable version of this component, open a console and execute the following command:
```
$ composer require ajgl/swiftmailer-mailer
```


Usage
-----

TBD

### Symfony Bundle

Enable the bundle in your bundles.php file:
```php
<?php

return [
    //...
    Ajgl\SwiftmailerMailer\Bundle\AjglSwiftmailerMailerBundle::class => ['dev' => true, 'test' => true],
    //...
];
```

**❮ WARNING ❯**: It requires the symfony mailer to be registered as `mailer.mailer`. See Symfony PR [#31854](https://github.com/symfony/symfony/pull/31854).

**❮ NOTE ❯**: The bundle will override the default mailer transport. See Symfony Bug [#31385](https://github.com/symfony/symfony/issues/31385) to see why.


License
-------

This component is under the MIT license. See the complete license in the [LICENSE] file.


Reporting an issue or a feature request
---------------------------------------

Issues and feature requests are tracked in the [Github issue tracker].


Author Information
------------------

Developed with ♥ by [Antonio J. García Lagar].

If you find this component useful, please add a ★ in the [GitHub repository page].

[LICENSE]: LICENSE
[Github issue tracker]: https://github.com/ajgarlag/AjglSwiftmailerMailer/issues
[Antonio J. García Lagar]: http://aj.garcialagar.es
[GitHub repository page]: https://github.com/ajgarlag/AjglSwiftmailerMailer
