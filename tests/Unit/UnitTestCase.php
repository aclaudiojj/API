<?php

namespace Tests\Unit;

use Mockery;
use Tests\TestCase;

class UnitTestCase extends TestCase
{
    /**
     * @var array
     */
    protected $dependencies;

    /**
     * @var array
     */
    protected $otherDependencies;

    /**
     * @var object
     */
    protected $testedClass;

    /**
     * @var object
     */
    protected $reflection;

    /**
     * @var object
     */
    protected $mocks;

    public function tearDown()
    {
        Mockery::close();

        $this->dependencies = [];
        $this->otherDependencies = [];
        $this->reflection = null;
        $this->testedClass = null;
    }

    public function mock($class)
    {
        $mock = Mockery::mock($class);
        $this->app->instance($class, $mock);

        return $mock;
    }

    public function setUp()
    {
        $this->reflection = new ReflectionClass($this->testedClass);
    }
}