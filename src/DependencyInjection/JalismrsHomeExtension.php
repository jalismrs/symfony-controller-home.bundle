<?php
declare(strict_types = 1);

namespace Jalismrs\Symfony\Bundle\JalismrsHomeBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

/**
 * Class JalismrsHomeExtension
 *
 * @package Jalismrs\Symfony\Bundle\JalismrsHomeBundle\DependencyInjection
 */
class JalismrsHomeExtension extends
    ConfigurableExtension
{
    /**
     * loadInternal
     *
     * @param array                                                   $mergedConfig
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @return void
     *
     * @throws \Exception
     */
    protected function loadInternal(
        array $mergedConfig,
        ContainerBuilder $container
    ) : void {
        $fileLocator    = new FileLocator(
            __DIR__ . '/../Resources/config'
        );
        $yamlFileLoader = new YamlFileLoader(
            $container,
            $fileLocator
        );
        $yamlFileLoader->load('services.yaml');
    
        $definition = $container->getDefinition(Configuration::CONFIG_ROOT . '.home_controller');
        $definition->replaceArgument(
            '$main',
            $mergedConfig['main']
        );
    
        $definition = $container->getDefinition(Configuration::CONFIG_ROOT . '.home_controller');
        $definition->replaceArgument(
            '$css',
            $mergedConfig['css']
        );
    
        $definition = $container->getDefinition(Configuration::CONFIG_ROOT . '.home_controller');
        $definition->replaceArgument(
            '$js',
            $mergedConfig['js']
        );
    }
}
