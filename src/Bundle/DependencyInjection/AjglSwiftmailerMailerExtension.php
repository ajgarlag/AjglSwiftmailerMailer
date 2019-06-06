<?php

declare(strict_types=1);

/*
 * AJGL Swift Mailer transport for Symfony Mailer
 *
 * Copyright (c) Antonio J. García Lagar <aj@garcialagar.es>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ajgl\SwiftmailerMailer\Bundle\DependencyInjection;

use RuntimeException;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Reference;

class AjglSwiftmailerMailerExtension extends Extension implements CompilerPassInterface
{
    private $overrideDefaultTransport = true;

    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new XmlFileLoader($container, new FileLocator(dirname(__DIR__).'/Resources/config'));
        $loader->load('services.xml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $this->overrideDefaultTransport = $config['override_default_transport'];
    }

    public function process(ContainerBuilder $container): void
    {
        if ($this->overrideDefaultTransport) {
            if (!$container->hasDefinition('mailer.mailer')) {
                throw new RuntimeException('See https://github.com/symfony/symfony/pull/31854');
            }
            $mailerDefinition = $container->getDefinition('mailer.mailer');
            $mailerDefinition->setArgument(0, new Reference('ajgl_swiftmailer_mailer.mailer.transport.swiftmailer'));
        }
    }
}
