<?php

// File generated from our OpenAPI spec
namespace DynamicOOOS\Stripe\Service\TestHelpers;

/**
 * Service factory class for API resources in the TestHelpers namespace.
 *
 * @property Terminal\TerminalServiceFactory $terminal
 * @property TestClockService $testClocks
 */
class TestHelpersServiceFactory extends \DynamicOOOS\Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = ['terminal' => Terminal\TerminalServiceFactory::class, 'testClocks' => TestClockService::class];
    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
