<?php

namespace Paysera\Component\Serializer\Tests\Entity;

use Paysera\Component\Serializer\Entity\Filter;
use Paysera\Component\Serializer\Entity\Result;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class FilterTest extends TestCase
{
    public function testOffsetDefaultsToZero()
    {
        $this->assertSame(0, (new Filter())->getOffset());
    }

    public function testOffsetDefaultsToZeroForSubclassNotCallingParentConstructor()
    {
        $this->assertSame(0, (new OwnConstructorFilter('done'))->getOffset());
    }

    public function testOffsetDefaultsToZeroWhenConstructorIsBypassed()
    {
        $filter = (new ReflectionClass(Filter::class))->newInstanceWithoutConstructor();

        $this->assertSame(0, $filter->getOffset());
    }

    public function testGetOffsetReturnsNullWhenCursorIsUsed()
    {
        $this->assertNull((new Filter())->setAfter('cursor')->getOffset());
        $this->assertNull((new Filter())->setBefore('cursor')->getOffset());
    }

    public function testCalculateTotalCountForSubclassNotCallingParentConstructor()
    {
        $result = (new Result(new OwnConstructorFilter()))->setItems([1, 2]);

        $this->assertSame(2, $result->calculateTotalCount(2));
        $this->assertSame(2, $result->getTotalCount());
    }
}

/**
 * Filter has no constructor and is designed for subclassing, so descendants are
 * not obliged to call parent::__construct(). Pins that contract down: the offset
 * default has to live on the property declaration for this to keep working.
 */
class OwnConstructorFilter extends Filter
{
    /**
     * @var string|null
     */
    protected $status;

    public function __construct($status = null)
    {
        $this->status = $status;
    }
}
