<?php
namespace Utils\Rector;

use Nette\Utils\Strings;
use PhpParser\Node;
use PhpParser\Node\Identifier;
use PhpParser\Node\Expr\MethodCall;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

final class SetToAdd extends AbstractRector
{
    /**
     * @return string[]
     */
    public function getNodeTypes(): array
    {
        // what node types are we looking for?
        // pick any node from https://github.com/rectorphp/php-parser-nodes-docs/
        return [MethodCall::class];
    }

    /**
     * @param MethodCall $node - we can add "MethodCall" type here, because
     *                         only this node is in "getNodeTypes()"
     */
    public function refactor(Node $node): ?Node
    {
        // we only care about "set*" method names
        if (! $this->isName($node->name, 'set*')) {
            // return null to skip it
            return null;
        }

        $methodCallName = $this->getName($node->name);
        $newMethodCallName = Strings::replace($methodCallName, '#^set#', 'add');

        $node->name = new Identifier($newMethodCallName);

        // return $node if you modified it
        return $node;
    }

    /**
     * From this method documentation is generated.
     */
    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Change method calls from set* to add*.', [
                new CodeSample(
                // code before
                    '$hamburger->setMeet(0.2);',
                    // code after
                    '$hamburger->addMeet(0.2);'
                ),
            ]
        );
    }
}