<?php

namespace Tests\Unit\Http\Controllers;

use Tests\Unit\UnitTestCase;

class ShoeControllerTest extends UnitTestCase
{

    public function setUp() : void
    {
        parent::setUp();

        $this->otherDependencies = [
            'request' => $this->mockClass(\Illuminate\Http\Request::class),
            'shoesResource' => $this->mock(\Api\Http\Resources\Shoes::class),
            'upload' => $this->mock(\Illuminate\Http\UploadedFile::class),
            'redirect' => $this->mock(\Illuminate\Http\RedirectResponse::class)
        ];

        $this->dependencies = [
            'service' => $this->mockClass(\Api\Services\ShoeService::class)
        ];

        $this->testedClass = new \Api\Http\Controllers\ShoeController(...array_values($this->dependencies));
    }

    public function testIndex()
    {
        $this->dependencies['service']
            ->shouldReceive('init')
            ->once()
            ->with($this->otherDependencies['request'])
            ->andReturnSelf()
            ->shouldReceive('index')
            ->once()
            ->with()
            ->andReturn($this->otherDependencies['shoesResource']);

        $return = $this->testedClass->index($this->otherDependencies['request']);

        $this->assertEquals($return, $this->otherDependencies['shoesResource']);
    }

    public function testStore()
    {
        $this->dependencies['service']
            ->shouldReceive('init')
            ->once()
            ->with($this->otherDependencies['request'])
            ->andReturnSelf()
            ->shouldReceive('store')
            ->once()
            ->with()
            ->andReturn($this->otherDependencies['shoesResource']);

        $return = $this->testedClass->store($this->otherDependencies['request']);

        $this->assertEquals($return, $this->otherDependencies['shoesResource']);
    }

    public function testShow()
    {
        $this->dependencies['service']
            ->shouldReceive('get')
            ->once()
            ->with(1)
            ->andReturn($this->otherDependencies['shoesResource']);

        $return = $this->testedClass->show(1);

        $this->assertEquals($return, $this->otherDependencies['shoesResource']);
    }

    public function testUpdate()
    {
        $this->dependencies['service']
            ->shouldReceive('init')
            ->once()
            ->with($this->otherDependencies['request'])
            ->andReturnSelf()
            ->shouldReceive('update')
            ->once()
            ->with(1)
            ->andReturn($this->otherDependencies['shoesResource']);

        $return = $this->testedClass->update($this->otherDependencies['request'], 1);

        $this->assertEquals($return, $this->otherDependencies['shoesResource']);
    }

    public function testDestroy()
    {
        $this->dependencies['service']
            ->shouldReceive('destroy')
            ->once()
            ->with(1)
            ->andReturnNull();

        $return = $this->testedClass->destroy(1);

        $this->assertNull($return);
    }
}