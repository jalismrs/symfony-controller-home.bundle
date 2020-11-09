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
    public const VIEW = 'JalismrsHomeBundle::main.html.twig';
    
    /**
     * appId
     *
     * @var string
     */
    private string $appId;
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
     * @param string $appId
     * @param array  $css
     * @param array  $js
     *
     * @codeCoverageIgnore
     */
    public function __construct(
        string $appId,
        array $css,
        array $js
    ) {
        $this->appId = $appId;
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
                'appId' => $this->appId,
                'css' => $this->css,
                'js' => $this->js,
            ],
        );
    }
}
