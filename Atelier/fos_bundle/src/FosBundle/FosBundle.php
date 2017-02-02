<?php

namespace FosBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class FosBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
