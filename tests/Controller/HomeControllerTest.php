<?php
declare(strict_types = 1);

namespace Tests\Controller;

use Jalismrs\Symfony\Bundle\JalismrsHomeBundle\Controller\HomeController;
use Jalismrs\Symfony\Bundle\JalismrsHomeBundle\ControllerService\HomeControllerService;
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
     * mockControllerService
     *
     * @var \PHPUnit\Framework\MockObject\MockObject|\Jalismrs\Symfony\Bundle\JalismrsHomeBundle\ControllerService\HomeControllerService
     */
    private MockObject $mockControllerService;
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
        $parameters = [];
        
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
        $this->mockControllerService
            ->expects(self::once())
            ->method('index')
            ->willReturn($parameters);
        $this->mockTwig
            ->expects(self::once())
            ->method('render')
            ->with(
                self::equalTo(HomeController::VIEW),
                self::equalTo($parameters),
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
            $this->mockControllerService
        );
        
        // act
        $globalsController->setContainer($this->mockContainer);
        
        return $globalsController;
    }
    
    /**
     * setUp
     *
     * @return void
     */
    protected function setUp() : void
    {
        parent::setUp();
        
        $this->mockContainer = $this->createMock(ContainerInterface::class);
        $this->mockControllerService = $this->createMock(HomeControllerService::class);
        $this->mockTwig      = $this->createMock(Environment::class);
    }
}
