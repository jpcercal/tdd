<?php

namespace Cekurte\Tdd\Test;

use Cekurte\Tdd\ReflectionTestCase;
use Cekurte\Tdd\Test\Resources\FakeObject\ReflectionClass;

class ReflectionTestCaseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param Cekurte\Tdd\ReflectionTestCase
     */
    private $testcase;

    /**
     * @param Cekurte\Tdd\Test\Resources\FakeObject\ReflectionClass
     */
    private $fakeObj;

    /**
     * Run before each test
     */
    public function setUp()
    {
        $this->testcase = new ReflectionTestCase();
        $this->fakeObj  = new ReflectionClass();
    }

    public function testInheritedAbstractFormatter()
    {
        $reflection = new \ReflectionClass(
            '\\Cekurte\\Tdd\\ReflectionTestCase'
        );

        $this->assertEquals(
            'PHPUnit_Framework_TestCase',
            $reflection->getParentClass()->getName()
        );
    }

    public function testInvokeMethod()
    {
        $this->assertEquals('fake', $this->testcase->invokeMethod($this->fakeObj, 'getData'));
    }

    public function testInvokeMethodWithParams()
    {
        $this->testcase->invokeMethod($this->fakeObj, 'setData', array('new'));

        $this->assertEquals('new', $this->testcase->invokeMethod($this->fakeObj, 'getData'));
    }

    public function testInvokeMethodWithMultipleParams()
    {
        $this->testcase->invokeMethod($this->fakeObj, 'setData', array('param1', 'ignore-param2', 'ignore-param3'));

        $this->assertEquals('param1', $this->testcase->invokeMethod($this->fakeObj, 'getData'));
    }

    /**
     * @expectedException \ReflectionException
     */
    public function testInvokeMethodError()
    {
        $this->testcase->invokeMethod($this->fakeObj, 'methodThatNotExists');
    }

    public function testPropertyGetValue()
    {
        $this->assertEquals('fake', $this->testcase->propertyGetValue($this->fakeObj, 'data'));
    }

    /**
     * @expectedException \ReflectionException
     */
    public function testPropertyGetValueError()
    {
        $this->testcase->propertyGetValue($this->fakeObj, 'propertyThatNotExists');
    }

    public function testPropertySetValue()
    {
        $this->testcase->propertySetValue($this->fakeObj, 'data', 'new');

        $this->assertEquals('new', $this->testcase->propertyGetValue($this->fakeObj, 'data'));
    }

    /**
     * @expectedException \ReflectionException
     */
    public function testPropertySetValueError()
    {
        $this->testcase->propertySetValue($this->fakeObj, 'propertyThatNotExists', 'new');
    }
}
