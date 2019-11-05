# Sluggable
[![Build Status](https://travis-ci.org/gordonbanderson/silverstripe-sluggable.svg?branch=master)](https://travis-ci.org/gordonbanderson/silverstripe-sluggable)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gordonbanderson/silverstripe-sluggable/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gordonbanderson/silverstripe-sluggable/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/gordonbanderson/silverstripe-sluggable/badges/build.png?b=master)](https://scrutinizer-ci.com/g/gordonbanderson/silverstripe-sluggable/build-status/master)
[![codecov.io](https://codecov.io/github/gordonbanderson/silverstripe-sluggable/coverage.svg?branch=master)](https://codecov.io/github/gordonbanderson/silverstripe-sluggable?branch=master)
[![Latest Stable Version](https://poser.pugx.org/suilven/sluggable/version)](https://packagist.org/packages/suilven/sluggable)
[![Latest Unstable Version](https://poser.pugx.org/suilven/sluggable/v/unstable)](//packagist.org/packages/suilven/sluggable)
[![Total Downloads](https://poser.pugx.org/suilven/sluggable/downloads)](https://packagist.org/packages/suilven/sluggable)
[![License](https://poser.pugx.org/suilven/sluggable/license)](https://packagist.org/packages/suilven/sluggable)
[![Monthly Downloads](https://poser.pugx.org/suilven/sluggable/d/monthly)](https://packagist.org/packages/suilven/sluggable)
[![Daily Downloads](https://poser.pugx.org/suilven/sluggable/d/daily)](https://packagist.org/packages/suilven/sluggable)

[![GitHub Code Size](https://img.shields.io/github/languages/code-size/gordonbanderson/silverstripe-sluggable)](https://github.com/gordonbanderson/silverstripe-sluggable)
[![GitHub Repo Size](https://img.shields.io/github/repo-size/gordonbanderson/silverstripe-sluggable)](https://github.com/gordonbanderson/silverstripe-sluggable)
[![GitHub Last Commit](https://img.shields.io/github/last-commit/gordonbanderson/silverstripe-sluggable)](https://github.com/gordonbanderson/silverstripe-sluggable)
[![GitHub Activity](https://img.shields.io/github/commit-activity/m/gordonbanderson/silverstripe-sluggable)](https://github.com/gordonbanderson/silverstripe-sluggable)


[![GitHub Issues](https://img.shields.io/github/issues/gordonbanderson/silverstripe-sluggable)](https://github.com/gordonbanderson/silverstripe-sluggable/issues)



![codecov.io](https://codecov.io/github/gordonbanderson/silverstripe-sluggable/branch.svg?branch=master)

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

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
