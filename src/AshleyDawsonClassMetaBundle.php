<?php

namespace AshleyDawson\ClassMetaBundle;

use AshleyDawson\ClassMetaBundle\DependencyInjection\Compiler\ServiceInjectionCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class AshleyDawsonClassMetaBundle
 *
 * @package AshleyDawson\ClassMetaBundle
 * @author Ashley Dawson
 */
class AshleyDawsonClassMetaBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new ServiceInjectionCompilerPass());
    }
}
