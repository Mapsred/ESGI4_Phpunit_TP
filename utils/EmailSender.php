<?php
/**
 * Created by PhpStorm.
 * User: francois.mathieu
 * Date: 13/11/2017
 * Time: 16:27
 */

namespace utils;


class EmailSender
{
    public function sendEmail($receiver, $content)
    {
        throw new \Exception("Not implemented");
    }

    /**
     * @throws \Exception
     * @return string
     */
    public function getMail()
    {
        throw new \Exception("Not implemented");
    }
}