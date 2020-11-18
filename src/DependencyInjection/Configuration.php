<?php
declare(strict_types = 1);

namespace Jalismrs\Symfony\Bundle\JalismrsHomeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @package Jalismrs\Symfony\Bundle\JalismrsHomeBundle\DependencyInjection
 */
class Configuration implements
    ConfigurationInterface
{
    public const CONFIG_ROOT = 'jalismrs_home';
    
    public function getConfigTreeBuilder() : TreeBuilder
    {
        $treeBuilder = new TreeBuilder(self::CONFIG_ROOT);
        
        // @formatter:off
        $treeBuilder
            ->getRootNode()
            ->children()
                ->arrayNode('css')
                    ->scalarPrototype()
                        ->cannotBeEmpty()
                    ->end()
                    ->defaultValue([])
                ->end()
                ->arrayNode('js')
                    ->scalarPrototype()
                        ->cannotBeEmpty()
                    ->end()
                    ->defaultValue([])
                ->end()
                ->arrayNode('main')
                    ->children()
                        ->scalarNode('id')
                            ->cannotBeEmpty()
                            ->defaultValue('app')
                        ->end()
                    ->end()
                ->end()
            ->end();
        // @formatter:on
        
        return $treeBuilder;
    }
}
