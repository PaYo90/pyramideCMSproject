<?php

namespace Wesel\Shortener;

class User
{
    public $id;
    public $email;
    public $roleId;

    public function __construct($id, $email, $roleId)
    {
        $this->id = $id;
        $this->email = $email;
        $this->roleId = $roleId;
    }

    public function isAdmin()
    {
        return $this->roleId == 1;
    }
}
