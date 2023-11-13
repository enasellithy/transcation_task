<?php


namespace App\SOLID\Traits;


trait MessageTraits
{
    public function done()
    {
        return session()->flash('success', 'تم التحديث بنجاح');
    }

    public function errorMsg($msg = null)
    {
        return session()->flash('danger', $msg);
    }
}
