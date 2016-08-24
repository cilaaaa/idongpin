<?php
/**
 * Created by PhpStorm.
 * Author: Cila
 * Date: 2016/6/29
 * Time: 14:22
 */
namespace App\Http\Models;

trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}