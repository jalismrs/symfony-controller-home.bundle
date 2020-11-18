<?php
declare(strict_types = 1);

namespace Tests\Controller;

use Jalismrs\Symfony\Bundle\JalismrsHomeBundle\Controller\HomeController;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Twig\Environment;

/**
 * Class HomeControllerTest
 *
 * @package Tests\Controller
 *
 * @covers  \Jalismrs\Symfony\Bundle\JalismrsHomeBundle\Controller\HomeController
 */
final class HomeControllerTest extends
    TestCase
{
    /**
     * mockContainer
     *
     * @var \PHPUnit\Framework\MockObject\MockObject|\Psr\Container\ContainerInterface
     */
    private MockObject $mockContainer;
    /**
     * mockTwig
     *
     * @var \PHPUnit\Framework\MockObject\MockObject|\Twig\Environment
     */
    private MockObject $mockTwig;
    
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
        
        $content = 'content';
        
        // expect
        $this->mockContainer
            ->expects(self::once())
            ->method('get')
            ->with(
                self::equalTo('twig'),
            )
            ->willReturn($this->mockTwig);
        $this->mockContainer
            ->expects(self::once())
            ->method('has')
            ->with(
                self::equalTo('twig'),
            )
            ->willReturn(true);
        $this->mockTwig
            ->expects(self::once())
            ->method('render')
            ->with(
                self::equalTo(HomeController::VIEW),
                self::logicalAnd(
                    self::isType('array'),
                    self::arrayHasKey('main'),
                    self::arrayHasKey('css'),
                    self::arrayHasKey('js'),
                ),
            )
            ->willReturn($content);
        
        // act
        $output = $systemUnderTest->index();
        
        // assert
        self::assertSame(
            $content,
            $output->getContent(),
        );
    }
    
    /**
     * createSUT
     *
     * @return \Jalismrs\Symfony\Bundle\JalismrsHomeBundle\Controller\HomeController
     */
    private function createSUT() : HomeController
    {
        // arrange
        $globalsController = new HomeController(
            [
                'id' => 'app',
            ],
            [],
            [],
        );
        
        // act
        $globalsController->setContainer($this->mockContainer);
        
        return $globalsController;
    }
    
    protected function setUp() : void
    {
        parent::setUp();
        
        $this->mockContainer = $this->createMock(ContainerInterface::class);
        $this->mockTwig      = $this->createMock(Environment::class);
    }
}
