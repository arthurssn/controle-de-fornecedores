<?php

namespace Tests\Unit\Services;

use App\Interfaces\BrasilAPI\IBrasilAPIService;
use App\Interfaces\Supplier\ISupplierRepository;
use App\Services\SupplierService;
use PHPUnit\Framework\TestCase;

class SupplierServiceTest extends TestCase
{
    private $mockRepository;
    private $mockBrasilAPIService;
    private $supplierService;

    protected function setUp(): void
    {
        $this->mockRepository = $this->createMock(ISupplierRepository::class);
        $this->mockBrasilAPIService = $this->createMock(IBrasilAPIService::class);
        $this->supplierService = new SupplierService($this->mockRepository, $this->mockBrasilAPIService);
    }

    public function testgetAllReturnsCompanyInfoWhenCnpjIsProvided()
    {
        $this->mockBrasilAPIService->expects($this->once())
            ->method('getCompanyInfo')
            ->with($this->equalTo('12345678901234'))
            ->willReturn(['companyInfo']);

        $result = $this->supplierService->getAll(['cnpj' => '12345678901234']);

        $this->assertEquals(['companyInfo'], $result);
    }

    public function testgetAllReturnsAllSuppliersWhenNoCnpjIsProvided()
    {
        $this->mockRepository->expects($this->once())
            ->method('getAll')
            ->willReturn(['supplier1', 'supplier2']);

        $result = $this->supplierService->getAll();

        $this->assertEquals(['supplier1', 'supplier2'], $result);
    }

    public function testcreateThrowsExceptionWhenCpfOrCnpjAlreadyInUse()
    {
        $this->mockRepository->expects($this->once())
            ->method('cpfOrCnpjAlreadyInUse')
            ->willReturn(true);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('CPF/CNPJ invalid or already in use');

        $this->supplierService->create(['cpf_cnpj' => '12345678901']);
    }

    public function testcreateThrowsExceptionWhenEmailAlreadyInUse()
    {
        $this->mockRepository->expects($this->once())
            ->method('emailAlreadyInUse')
            ->willReturn(true);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Email already in use');

        $this->supplierService->create(['email' => 'test@test.com', 'cpf_cnpj' => '12345678901']);
    }

    public function testcreateThrowsExceptionWhenPhoneAlreadyInUse()
    {
        $this->mockRepository->expects($this->once())
            ->method('phoneAlreadyInUse')
            ->willReturn(true);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Phone already in use');

        $this->supplierService->create(['phone' => '1234567890', 'cpf_cnpj' => '12345678901']);
    }

    public function testcreateReturnsExpectedResult()
    {
        $data = ['name' => 'new supplier'];
        $this->mockRepository->expects($this->any())
            ->method('create')
            ->with($this->equalTo($data))
            ->willReturn((object)['id' => 1, 'name' => 'new supplier']);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('CPF/CNPJ invalid or already in use');

        $result = $this->supplierService->create($data);
    }
}
