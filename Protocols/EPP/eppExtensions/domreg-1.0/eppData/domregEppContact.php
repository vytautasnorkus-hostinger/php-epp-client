<?php

namespace Metaregistrar\EPP;

class domregEppContact extends eppContact
{
    private $role;

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }
}
