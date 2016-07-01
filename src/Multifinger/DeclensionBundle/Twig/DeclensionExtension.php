<?php
/**
 * @author Maksim Borisov <maksim.i.borisov@gmail.com> 01.07.16 12:54
 */

namespace Multifinger\DeclensionBundle\Twig;


use Multifinger\DeclensionBundle\Service\DeclensionService;

class DeclensionExtension extends \Twig_Extension
{

    /** @var DeclensionService  */
    protected $service;

    public function __construct(DeclensionService $service)
    {
        $this->service = $service;
    }


    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('declension', array($this, 'declineFilter'))
        );
    }

    public function declineFilter($name, $case)
    {
        return $this->service->decline($name, $case);
    }

    public function getName()
    {
        return 'multifinger_declension_extension';
    }


}