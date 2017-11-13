<?php
/**
 * Created by PhpStorm.
 * User: francois.mathieu
 * Date: 13/11/2017
 * Time: 16:26
 */

namespace Utils;


class DatabaseConnection
{
    public function saveProduct(Product $product)
    {
        throw new \Exception("Not implemented");
    }

    public function saveUser(User $user)
    {
        throw new \Exception("Not implemented");
    }

    /**
     * @param Exchange $exchange
     * @throws \Exception
     * @return boolean
     */
    public function saveExchange(Exchange $exchange)
    {
        throw new \Exception("Not implemented");
    }
}