<?php
/**
 * @author Maksim Borisov <maksim.i.borisov@gmail.com> 01.07.16 12:04
 */

namespace Multifinger\DeclensionBundle\Provider;


abstract class AbstractHttpProvider implements ProviderInterface
{
    const HTTP_TIMEOUT = 6;

    protected function load($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, self::HTTP_TIMEOUT);
        $result = curl_exec($ch);

        if (curl_errno($ch) || !$result) {
            // TODO invoke warning (log or email - use monolog)
            return false;
        }

        curl_close($ch);

        return $result;
    }

}
