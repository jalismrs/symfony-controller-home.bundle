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
     * main
     *
     * @var array
     */
    private array $main;
    /**
     * css
     *
     * @var array
     */
    private array $css;
    /**
     * js
     *
     * @var array
     */
    private array $js;
    
    /**
     * HomeController constructor.
     *
     * @param array $main
     * @param array $css
     * @param array $js
     *
     * @codeCoverageIgnore
     */
    public function __construct(
        array $main,
        array $css,
        array $js
    ) {
        $this->main = $main;
        $this->css = $css;
        $this->js = $js;
    }
    
    /**
     * index
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index() : Response {
        return $this->render(
            self::VIEW,
            [
                'main' => $this->main,
                'css'  => $this->css,
                'js'   => $this->js,
            ],
        );
    }
}
