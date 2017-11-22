<?php

namespace Larapulse\Support\Tests\Functions;

use PHPUnit\Framework\TestCase;
use Larapulse\Support\Handlers\Arr;
use Illuminate\Support\Arr as IlluminateArr;

class ArrTest extends TestCase
{
    public function testFlatten()
    {
        $input1 = ['a', ['b', ['c', ['d', 'e'], 'f'], 'g'], 'h'];
        $funcResult1 = array_flatten($input1, 2);
        $classResult1 = Arr::flatten($input1, 2);

        $this->assertEquals($classResult1, $funcResult1);
        $this->assertSame($classResult1, $funcResult1);

        // TODO: Fix -> Prevent load IlluminateArr::flatten
//        $input2 = ['a', ['b', ['c', ['d', 'e'], 'f'], 'g'], 'h'];
//        $funcResult2 = array_flatten($input2, 0);
//        $classResult2 = Arr::flatten($input2, 0);
//
//        $this->assertEquals($classResult2, $funcResult2);
//        $this->assertSame($classResult2, $funcResult2);
    }

    public function testFlattenAssoc()
    {
        $input = ['a' => 1, 'sub1' => ['b' => 2, 'sub2'  => ['c' => 3], 'd' => 4], 'e' => 5];
        $funcResult = array_flatten_assoc($input, 1);
        $classResult = Arr::flattenAssoc($input, 1);

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }

    public function testDepth()
    {
        $input = ['a', ['b', ['c', ['d', 'e'], 'f'], 'g'], 'h'];
        $funcResult = array_depth($input);
        $classResult = Arr::depth($input);

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }

    public function testIsOfType()
    {
        $input = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
        $funcResult = is_array_of_type($input, 'str');
        $classResult = Arr::isTypeOf($input, 'str');

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }

    public function testIsOfTypes()
    {
        $input = ['a', ['b', ['c', ['d', 'e'], 'f'], 'g'], 'h'];
        $funcResult = is_array_of_types($input, ['str', 'array']);
        $classResult = Arr::isTypesOf($input, ['str', 'array']);

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }

    public function testIsOfInstances()
    {
        $input = [$this, $this, $this];
        $funcResult = is_array_of_instance($input, self::class);
        $classResult = Arr::isInstancesOf($input, self::class);

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }

    public function testIsAssoc()
    {
        $input = ['a', ['b', ['c', ['d', 'e'], 'f'], 'g'], 'h'];
        $funcResult = array_is_assoc($input);
        $classResult = IlluminateArr::isAssoc($input);

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }
}
