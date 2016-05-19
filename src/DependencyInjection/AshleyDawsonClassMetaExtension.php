<?php

namespace AshleyDawson\ClassMetaBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Definition\Processor;

/**
 * Class AshleyDawsonClassMetaExtension
 *
 * @package AshleyDawson\ClassMetaBundle\DependencyInjection
 * @author Ashley Dawson
 */
class AshleyDawsonClassMetaExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $processor = new Processor();

        $config = $processor->processConfiguration($configuration, $config);
        
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');

        $container->setParameter('ashleydawson.class_meta.cache_provider_service_id', $config['cache_provider_service_id']);
    }
}