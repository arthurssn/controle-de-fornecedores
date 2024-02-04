<?php

namespace Tests\Unit\Services;

use App\Interfaces\ICRUD;
use App\Services\CRUDService;
use PHPUnit\Framework\TestCase;

class CRUDServiceTest extends TestCase
{
    private $mockRepository;
    private $crudService;

    protected function setUp(): void
    {
        $this->mockRepository = $this->createMock(ICRUD::class);
        $this->crudService = new CRUDService($this->mockRepository);
    }

    public function testGetAllReturnsExpectedResults()
    {
        $this->mockRepository->expects($this->once())
            ->method('getAll')
            ->willReturn(['item1', 'item2']);

        $result = $this->crudService->getAll();

        $this->assertEquals(['item1', 'item2'], $result);
    }

    public function testGetByIdReturnsExpectedResult()
    {
        $this->mockRepository->expects($this->once())
            ->method('getById')
            ->with($this->equalTo(1))
            ->willReturn((object)['id' => 1, 'name' => 'item1']);

        $result = $this->crudService->getById(1);

        $this->assertEquals((object)['id' => 1, 'name' => 'item1'], $result);
    }

    public function testCreateReturnsExpectedResult()
    {
        $data = ['name' => 'new item'];
        $this->mockRepository->expects($this->once())
            ->method('create')
            ->with($this->equalTo($data))
            ->willReturn((object)['id' => 1, 'name' => 'new item']);

        $result = $this->crudService->create($data);

        $this->assertEquals((object)['id' => 1, 'name' => 'new item'], $result);
    }

    public function testUpdateReturnsExpectedResult()
    {
        $data = ['name' => 'updated item'];
        $this->mockRepository->expects($this->once())
            ->method('update')
            ->with($this->equalTo($data), $this->equalTo(1))
            ->willReturn((object)['id' => 1, 'name' => 'updated item']);

        $result = $this->crudService->update($data, 1);

        $this->assertEquals((object)['id' => 1, 'name' => 'updated item'], $result);
    }

    public function testDeleteReturnsExpectedResult()
    {
        $this->mockRepository->expects($this->once())
            ->method('delete')
            ->with($this->equalTo(1))
            ->willReturn(true);

        $result = $this->crudService->delete(1);

        $this->assertTrue($result);
    }
}
