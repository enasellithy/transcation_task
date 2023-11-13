<?php

namespace App\Solid\Traits;

trait MessageTraits
{
    public function done()
    {
        return session()->flash('success', 'Request Is Successfully');
    }

    public function errorMsg($msg = null)
    {
        return session()->flash('danger', $msg);
    }
}
