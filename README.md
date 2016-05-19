Class Meta Bundle
=================

Symfony bundle for my [Class Meta](https://github.com/AshleyDawson/ClassMeta) library. This allows you to attach arbitrary
metadata to classes and their constants via annotation.

Installation
------------

To install via composer, use the following command:

```
$ composer require ashleydawson/class-meta-bundle
```

And then add the bundle to the `AppKernel#registerBundles()` method:

```php
$bundles = [
    // ...
    new AshleyDawson\ClassMetaBundle\AshleyDawsonClassMetaBundle(),
];
```

Configuration
-------------

Configuration allows you to configure a cache provider. By default the cache provider is ArrayCache - so in 
production, I'd advise you change this to a a more persistent cache strategy:

```yaml
# app/config/config.yml

services:
    my_class_meta_cache_provider:
        class: Doctrine\Common\Cache\FilesystemCache
        arguments: [ "%kernel.cache_dir%/ashleydawson/class_meta" ]

ashley_dawson_class_meta:
    cache_provider_service_id: my_class_meta_cache_provider
```

*Note:* To disable the cache, simply pass the id of a `Doctrine\Common\Cache\VoidCache` service.

Basic Usage
-----------

To use the meta cache manager service in a controller, simply do:

```php
public function indexAction()
{
    $meta = $this->get('ashleydawson.class_meta')->getClassConstantsMeta('AppBundle\Enum\MyEnum');
    
    dump($meta);
}
```

For more documentation, please see the [full library readme](https://github.com/AshleyDawson/ClassMeta/blob/master/README.md).