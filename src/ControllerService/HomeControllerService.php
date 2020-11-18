<?php
declare(strict_types = 1);

namespace Jalismrs\Symfony\Bundle\JalismrsHomeBundle\ControllerService;

use function array_unique;
use function array_values;

/**
 * Class HomeControllerService
 *
 * @package Jalismrs\Symfony\Bundle\JalismrsHomeBundle\Controller
 */
class HomeControllerService
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
     * HomeControllerService constructor.
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
        $this->css  = self::cleanParameters($css);
        $this->js   = self::cleanParameters($js);
    }
    
    /**
     * cleanParameters
     *
     * @static
     *
     * @param array $parameters
     *
     * @return array
     */
    private static function cleanParameters(
        array $parameters
    ): array {
        $parameters = array_unique($parameters);
        $parameters = array_values($parameters);
        
        return $parameters;
    }
    
    /**
     * index
     *
     * @return array
     */
    public function index() : array
    {
        return [
            'main' => $this->main,
            'css'  => $this->css,
            'js'   => $this->js,
        ];
    }
}
