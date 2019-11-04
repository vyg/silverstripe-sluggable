# Sluggable

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This module allows the developer to add a field that will be converted to a slug (kebab case) when saved

# Configuration
```yml
---
Name: cricket-slugs
---

Suilven\CricketSite\Model\Club:
  extensions:
    - Suilven\Sluggable\Extension\Sluggable
  slug: Name

Suilven\CricketSite\Model\Player:
  extensions:
    - Suilven\Sluggable\Extension\Sluggable
  slug: DisplayName
```

# Enable Configuration
```bash
vendor/bin/sake dev/build flush=all
```
Then reload /admin?flush=all

Now when the above models are saved, they will be saved with a slug associated with them.



## Install

Via Composer

``` bash
$ composer require suilven/sluggable
```

## Usage

``` php
$skeleton = new Suilven\sluggable();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email gordon.b.anderson@gmail.com instead of using the issue tracker.

## Credits

- [Gordon Anderson][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/suilven/sluggable.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/suilven/sluggable/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/suilven/sluggable.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/suilven/sluggable.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/suilven/sluggable.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/suilven/sluggable
[link-travis]: https://travis-ci.org/suilven/sluggable
[link-scrutinizer]: https://scrutinizer-ci.com/g/suilven/sluggable/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/suilven/sluggable
[link-downloads]: https://packagist.org/packages/suilven/sluggable
[link-author]: https://github.com/gordonbanderson
[link-contributors]: ../../contributors
