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

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('ajgl_swiftmailer_mailer');

        $treeBuilder->getRootNode()
            ->children()
                ->booleanNode('override_default_transport')
                    ->defaultTrue()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
