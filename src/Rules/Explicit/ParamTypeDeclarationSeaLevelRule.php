<?php

declare(strict_types=1);

namespace Symplify\PHPStanRules\Rules\Explicit;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Node\CollectedDataNode;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;
use Symplify\RuleDocGenerator\Contract\DocumentedRuleInterface;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @implements Rule<CollectedDataNode>
 * @deprecated
 */
final class ParamTypeDeclarationSeaLevelRule implements Rule
{
    /**
     * @var string
     */
    public const ERROR_MESSAGE = 'Out of %d possible param types, only %d %% actually have it. Add more param types to get over %d %%';

    /**
     * @return class-string<Node>
     */
    public function getNodeType(): string
    {
        return CollectedDataNode::class;
    }

    /**
     * @param CollectedDataNode $node
     * @return mixed[]
     */
    public function processNode(Node $node, Scope $scope): array
    {
        return [
            RuleErrorBuilder::message(sprintf(
                'The "%s" rule was deprecated and moved to "%s" package that has much simpler configuration. Use it instead.',
                self::class,
                'https://github.com/TomasVotruba/type-coverage'
            ))->build(),
        ];
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(self::ERROR_MESSAGE, [
            new CodeSample(
                <<<'CODE_SAMPLE'
final class SomeClass
{
    public function run($name, $age)
    {
    }
}
CODE_SAMPLE
                ,
                <<<'CODE_SAMPLE'
final class SomeClass
{
    public function run(string $name, int $age)
    {
    }
}
CODE_SAMPLE
            ),
        ]);
    }
}
