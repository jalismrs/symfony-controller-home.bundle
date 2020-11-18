<?php
declare(strict_types = 1);

namespace Tests\ControllerService;

use Jalismrs\Symfony\Bundle\JalismrsHomeBundle\ControllerService\HomeControllerService;
use PHPUnit\Framework\TestCase;

/**
 * Class HomeControllerServiceTest
 *
 * @package Tests\ControllerService
 *
 * @covers  \Jalismrs\Symfony\Bundle\JalismrsHomeBundle\ControllerService\HomeControllerService
 */
final class HomeControllerServiceTest extends
    TestCase
{
    /**
     * testIndex
     *
     * @return void
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \PHPUnit\Framework\MockObject\RuntimeException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws \Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException
     */
    public function testIndex() : void
    {
        // arrange
        $systemUnderTest = $this->createSUT();
        
        // act
        $output = $systemUnderTest->index();
        
        // assert
        self::assertCount(
            3,
            $output,
        );
        self::assertArrayHasKey(
            'main',
            $output,
        );
        self::assertCount(
            1,
            $output['main'],
        );
        self::assertIsArray(
            $output['main'],
        );
        self::assertCount(
            1,
            $output['main'],
        );
        self::assertArrayHasKey(
            'id',
            $output['main'],
        );
        self::assertSame(
            'app',
            $output['main']['id'],
        );
        self::assertArrayHasKey(
            'css',
            $output,
        );
        self::assertIsArray(
            $output['css'],
        );
        self::assertArrayHasKey(
            'js',
            $output,
        );
        self::assertIsArray(
            $output['js'],
        );
    }
    
    /**
     * createSUT
     *
     * @return \Jalismrs\Symfony\Bundle\JalismrsHomeBundle\ControllerService\HomeControllerService
     */
    private function createSUT() : HomeControllerService
    {
        return new HomeControllerService(
            [
                'id' => 'app',
            ],
            [],
            [],
        );
    }
}
