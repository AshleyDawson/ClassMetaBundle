<?php

namespace AshleyDawson\ClassMetaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

/**
 * Class Configuration
 *
 * @package AshleyDawson\ClassMetaBundle\DependencyInjection
 * @author Ashley Dawson
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('ashley_dawson_class_meta');

        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->scalarNode('cache_provider_service_id')->defaultValue(null)->end()
                ->integerNode('cache_provider_ttl')->defaultValue(300)->end()
            ->end();

        return $treeBuilder;
    }
}
