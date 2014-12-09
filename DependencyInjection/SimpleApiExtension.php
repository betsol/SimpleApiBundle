<?php

namespace Betsol\Bundle\SimpleApiBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * Extension class.
 *
 * @author Slava Fomin II <s.fomin@betsol.ru>
 */
class SimpleApiExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration;

        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );

        $loader->load('config.xml');

        $container->setParameter('simple_api.enable_for_all_controllers', $config['enable_for_all_controllers']);
    }
}