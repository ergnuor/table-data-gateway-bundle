<?php

declare(strict_types=1);

namespace Ergnuor\TableDataGatewayBundle;

use Ergnuor\TableDataGatewayBundle\DependencyInjection\Compiler\SerializerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ErgnuorTableDataGatewayBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new SerializerPass());
    }

}