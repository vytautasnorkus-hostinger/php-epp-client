<?php

namespace Metaregistrar\EPP;

class domregEppInfoContactResponse extends eppInfoContactResponse
{
    /**
     * @return string|null
     */
    public function getOrganizationCode()
    {
        return $this->queryPath('/epp:epp/epp:response/epp:resData/contact:infData/contact:orgcode');
    }
}
