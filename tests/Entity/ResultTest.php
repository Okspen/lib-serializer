<?php

namespace Paysera\Component\Serializer\Tests\Entity;

use Paysera\Component\Serializer\Entity\Result;
use PHPUnit\Framework\TestCase;

class ResultTest extends TestCase
{
    public function testIterateResultWithoutItems()
    {
        $result = new Result();

        $this->assertSame([], iterator_to_array($result));
    }

    public function testGetItemsReturnsArrayWhenItemsNotSet()
    {
        $result = new Result();

        $this->assertSame([], $result->getItems());
    }

    public function testIterateResultWithItems()
    {
        $result = (new Result())->setItems([1, 2, 3]);

        $this->assertSame([1, 2, 3], iterator_to_array($result));
    }

    public function testAddItemWithoutSettingItemsFirst()
    {
        $result = new Result();
        $result->addItem('a');

        $this->assertSame(['a'], $result->getItems());
    }
}
