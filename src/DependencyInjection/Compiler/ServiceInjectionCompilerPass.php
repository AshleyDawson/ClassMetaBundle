<?php

namespace AshleyDawson\ClassMetaBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class ServiceInjectionCompilerPass
 *
 * @package AshleyDawson\ClassMetaBundle\DependencyInjection\Compiler
 * @author Ashley Dawson
 */
class ServiceInjectionCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if ($cacheServiceId = $container->getParameter('ashleydawson.class_meta.cache_provider_service_id')) {
            $definition = $container
                ->findDefinition('ashleydawson.class_meta');

            $definition
                ->addMethodCall('setCache', [new Reference($cacheServiceId)]);
        }
    }
}
