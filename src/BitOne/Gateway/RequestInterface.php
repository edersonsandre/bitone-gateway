<?php
/**
 * Created by PhpStorm.
 * User: edersonsandre
 * Date: 02/07/16
 * Time: 01:36
 */

namespace BitOne\Gateway;

interface RequestInterface {

    public function response();

    public function requestTransaction($data);

} 