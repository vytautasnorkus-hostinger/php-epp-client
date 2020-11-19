<?php

namespace Metaregistrar\EPP;

class eppInfoOrganizationResponse extends eppInfoContactResponse
{
    /**
     * @return string
     */
    public function getOrganization()
    {
        return $this->queryPath('/epp:epp/epp:response/epp:extension/brorg:infData/brorg:organization');
    }
}