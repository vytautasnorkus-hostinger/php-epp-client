<?php

namespace Metaregistrar\EPP;

class domregEppUpdateContactRequest extends eppUpdateContactRequest
{
    public function __construct($objectname, $addinfo = null, $removeinfo = null, $updateinfo = null, $namespacesinroot = true)
    {
        parent::__construct($objectname, $addinfo, $removeinfo, $updateinfo, $namespacesinroot);

        if (!$this->rootNamespaces()) {
            $this->contactobject->setAttribute('xmlns:contact', 'http://www.domreg.lt/epp/xml/domreg-contact-1.1');
        }
    }
}
