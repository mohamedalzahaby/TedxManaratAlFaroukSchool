<?php

namespace Illuminate\Foundation\Auth;

trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {


        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }
        $this->redirectTo = '/about';

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/about';
    }
}
