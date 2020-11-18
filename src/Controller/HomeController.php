<?php
declare(strict_types = 1);

namespace Jalismrs\Symfony\Bundle\JalismrsHomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class HomeController
 *
 * @package Jalismrs\Symfony\Bundle\JalismrsHomeBundle\Controller
 */
class HomeController extends AbstractController
{
    public const VIEW = '@JalismrsHome/main.html.twig';
    
    /**
     * controllerService
     *
     * @var \Jalismrs\Symfony\Bundle\JalismrsHomeBundle\Controller\HomeControllerService
     */
    private HomeControllerService $controllerService;
    
    /**
     * HomeController constructor.
     *
     * @param \Jalismrs\Symfony\Bundle\JalismrsHomeBundle\Controller\HomeControllerService $controllerService
     *
     * @codeCoverageIgnore
     */
    public function __construct(
        HomeControllerService $controllerService
    ) {
        $this->controllerService = $controllerService;
    }
    
    /**
     * index
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index() : Response {
        return $this->render(
            self::VIEW,
            $this->controllerService->index(),
        );
    }
}
