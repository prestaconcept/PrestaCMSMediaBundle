Presta CMS Media Bundle
=============

[![Build Status](https://secure.travis-ci.org/prestaconcept/PrestaCMSMediaBundle.png)](http://travis-ci.org/prestaconcept/PrestaCMSMediaBundle)
[![Total Downloads](https://poser.pugx.org/presta/cms-media-bundle/downloads.png)](https://packagist.org/packages/presta/cms-media-bundle)
[![Latest Stable Version](https://poser.pugx.org/presta/cms-media-bundle/v/stable.png)](https://packagist.org/packages/presta/cms-media-bundle)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/d4e48cf2-8182-4eae-a7aa-f2c370cffb55/big.png)](https://insight.sensiolabs.com/projects/d4e48cf2-8182-4eae-a7aa-f2c370cffb55)

PrestaCMSMediaBundle integrates Sonata Media in [PrestaCMS][1].

:book: Documentation is available on [prestaconcept.github.io][4]

:speech_balloon: If you want to have some informations about the projet progession you can register to our [google group][3]

:book: For a ready to use demonstration of PrestaCMS you should check the [prestacms-sandox available on github][2].

## Installation ##

### 1) Install dependencies

- First you need to follow the [ :book: PrestaCMS installation steps][1].
- And the [:book: SonataMediaBundle][4]

### 2) Get the bundle

    php composer.phar require presta/presta/cms-media-bundle:dev-master --no-update
    php composer.phar update presta/presta/cms-media-bundle

### 3) Update your AppKernel to register the bundle

```php
<?php
// app/AppKernel.php
public function registerBundles()
{
    return array(
        // ...
        new Presta\CMSMediaBundle\PrestaCMSMediaBundle(),
        // ...
    );
}
```

---

*This project is supported by [PrestaConcept](http://www.prestaconcept.net)*

**Lead Developer** : [@nicolas-bastien](https://github.com/nicolas-bastien)

Released under the MIT License

[1]: https://github.com/prestaconcept/PrestaCMSCoreBundle
[2]: http://sandbox.prestacms.fr/medias/media
[3]: https://groups.google.com/forum/?hl=fr&fromgroups#!forum/prestacms-devs
[4]: http://prestaconcept.github.io/presta-cms-media/
