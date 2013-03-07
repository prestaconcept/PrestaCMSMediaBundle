Presta CMS Media Bundle  [![Build Status](https://secure.travis-ci.org/prestaconcept/PrestaCMSMediaBundle.png)](http://travis-ci.org/prestaconcept/PrestaCMSMediaBundle)
=============

This bundle adds media blocks to [PrestaCMS][1].

** Important ** :construction: This bundles is currently under development

:speech_balloon: If you want to have some informations about the projet progession you can register to our [google group][3]

:book: For a ready to use demonstration of PrestaCMS you should check the [prestacms-sandox available on github]().

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

## Media block

### Carousel

Carousel block allow you to add carousel based on a Sonata gallery. It contains three type of format : full, medium and small to be easilly integrated
in any kind of container.

Here is an exemple with Creative theme :
![PrestaCMS Creative Carousel](https://raw.github.com/prestaconcept/PrestaCMSMediaBundle/master/Resources/docs/assets/creative-carousel.jpg)

### Media and Media advanced

This blocks allow you to add a sonata media.

The advanced media adds a title, a content and handle a layout parameter which allow you to have different rendering with the same block.

Here is an exemple with Creative theme :
![PrestaCMS Creative Media](https://raw.github.com/prestaconcept/PrestaCMSMediaBundle/master/Resources/docs/assets/creative-media.jpg)

### Gallery and Gallery advanced

The same thing for rendering galleries

Here is an exemple with Creative theme :
![PrestaCMS Creative Gallery](https://raw.github.com/prestaconcept/PrestaCMSMediaBundle/master/Resources/docs/assets/creative-gallery.jpg)


## Customize it for your project need

### Change rendering

This bundle provides blocks with a basic HTML structure, if you need to add some HTML elements, css class... the best way is to benefit of [Symfony 2
way to override template][5].

First use easy-extends to generate your application bundle :

    php app/console sonata:easy-extends:generate PrestaCMSMediaBundle --dest=src

Then you just need to override the template you need.

### Add settings

If you need to add settings or functionnality, create your own application bundle with the command line above and create your own block.

Then either you need it as a new block and you should register it as a block service or you just want it to override the default block and you should
add a parameter for the corresponding block class.

Have a look at the [services.yml][6] file for a full list of parameters :

- Carousel : %presta_cms.block.carousel.class%
- Media : %presta_cms.block.media.class%
- Media Advanced : %presta_cms.block.media_advanced.class%
- Gallery : %presta_cms.block.gallery.class%
- Gallery Advanced : %presta_cms.block.gallery_advanced.class%

## Ask for help ##

:speech_balloon: If you need help about this project you can [post a message on our google group][3]

## How to contribute ##

The best way to contribute is to use Github Pull Request system. Any contributions like translation, documentation, bug reporting...

This bundle is not meant to contain complex template or js librairies.

If you want to make advanced rendering maybe the best way to do that is to build a theme.


---

*This project is supported by [PrestaConcept](http://www.prestaconcept.net)*

**Lead Developer** : @nicolas-bastien

[1]: https://github.com/prestaconcept/PrestaCMSCoreBundle
[2]: https://github.com/prestaconcept/prestacms-sandbox
[3]: https://groups.google.com/forum/?hl=fr&fromgroups#!forum/prestacms-devs
[4]: http://sonata-project.org/bundles/media/master/doc/reference/installation.html
[5]: http://symfony.com/doc/2.0/book/templating.html#overriding-bundle-templates
[6]: https://github.com/prestaconcept/PrestaCMSMediaBundle/blob/master/Resources/config/services.yml
