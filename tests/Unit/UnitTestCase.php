<?php

namespace Tests\Unit;

use Mockery;
use Tests\TestCase;
use Tests\CreatesApplication;

class UnitTestCase extends TestCase
{
    use CreatesApplication;

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

    public function tearDown() : void
    {
        Mockery::close();

        $this->dependencies = [];
        $this->otherDependencies = [];
        $this->reflection = null;
        $this->testedClass = null;
    }

    public function mockClass($class)
    {
        $mock = Mockery::mock($class);
        $this->app->instance($class, $mock);

        return $mock;
    }

    public function setUp() : void
    {
        $this->app = $this->createApplication();

        parent::setUp();
    }
}