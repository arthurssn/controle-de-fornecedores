<?php

namespace Tests\Unit\Services;

use App\Interfaces\BrasilAPI\IBrasilAPIRepository;
use App\Services\BrasilAPIService;
use PHPUnit\Framework\TestCase;

class BrasilAPIServiceTest extends TestCase
{
    private $mockRepository;
    private $brasilAPIService;

    protected function setUp(): void
    {
        $this->mockRepository = $this->createMock(IBrasilAPIRepository::class);
        $this->brasilAPIService = new BrasilAPIService($this->mockRepository);
    }

    public function testgetCompanyInfoReturnsExpectedResult()
    {
        $this->mockRepository->expects($this->once())
            ->method('getCompanyInfo')
            ->with($this->equalTo('12345678901234'))
            ->willReturn(['companyInfo']);

        $result = $this->brasilAPIService->getCompanyInfo('12345678901234');

        $this->assertEquals(['companyInfo'], $result);
    }

    public function testgetCompanyInfoThrowsExceptionWhenRepositoryReturnsError()
    {
        $this->mockRepository->expects($this->once())
            ->method('getCompanyInfo')
            ->will($this->throwException(new \Exception()));

        $this->expectException(\Exception::class);

        $this->brasilAPIService->getCompanyInfo('12345678901234');
    }
}
