<?php

namespace Symplify\PHPStanRules\Tests\Rules\ClassExtendingExclusiveNamespaceRule\Fixture\App\Component\PriceEngineImpl;

use Symplify\PHPStanRules\Tests\Rules\ClassExtendingExclusiveNamespaceRule\Fixture\App\Component\PriceEngine\ProductProviderInterface;

class SkipDealerProductProviderInAuthorizedNamespace implements ProductProviderInterface
{

}