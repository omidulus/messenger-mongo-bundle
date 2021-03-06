<?php

declare(strict_types=1);

namespace EmagTechLabs\MessengerMongoBundle;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MessengerMongoBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new class implements CompilerPassInterface {
            public function process(ContainerBuilder $container)
            {
                $container->findDefinition('messenger.transport.mongo.factory')
                    ->addArgument(new Reference('service_container'));
            }
        });
    }
}
