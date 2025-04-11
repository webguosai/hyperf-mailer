<?php

declare(strict_types=1);

namespace Webguosai\HyperfMailer;

use Hyperf\Contract\ConfigInterface;
use Psr\Container\ContainerInterface;
use function Hyperf\Support\make;

class MailerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get(ConfigInterface::class);
        $option = $config->get('mailer');

        return make(Smtp::class, [
            'config' => $option,
        ]);
    }
}