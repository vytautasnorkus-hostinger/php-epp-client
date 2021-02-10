<?php

namespace Metaregistrar\EPP;

class domregEppContact extends eppContact
{
    /** @var string $role */
    private $role;

    /** @var string $orgCode */
    private $orgCode;

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
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getOrgCode()
    {
        return $this->orgCode;
    }

    /**
     * @param string $orgCode
     */
    public function setOrgCode($orgCode)
    {
        $this->orgCode = $orgCode;
    }
}
