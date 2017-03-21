<?php
/**
 * @author Maksim Borisov <maksim.i.borisov@gmail.com> 01.07.16 12:11
 */

namespace Multifinger\DeclensionBundle\Provider;


class MorpherProvider extends AbstractHttpProvider
{

    const URL = 'http://morpher.ru/WebService.asmx/GetXml';

    public function decline($name)
    {
        $url = self::URL.'?'.http_build_query(array('s' => $name));
        $tags = simplexml_load_string($this->load($url));

        return json_decode(json_encode($tags), true);
    }

}
