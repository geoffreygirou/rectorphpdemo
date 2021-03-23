<?php
declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Utils\Rector\SetToAdd;

return static function (ContainerConfigurator $containerConfigurator): void {
    // get parameters
    $parameters = $containerConfigurator->parameters();

    // Define what rule sets will be applied
    $parameters->set(Option::SETS, [
        SetList::DEAD_CODE,
        SetList::PHP_80,
        SetList::CODE_QUALITY
    ]);
    // register single rule
    $services = $containerConfigurator->services();
    $services->set(SetToAdd::class);
};
