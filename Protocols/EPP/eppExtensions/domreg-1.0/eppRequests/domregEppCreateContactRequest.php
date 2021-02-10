<?php

namespace Metaregistrar\EPP;

class domregEppCreateContactRequest extends eppCreateContactRequest
{
    public function __construct($createinfo, $namespacesinroot = true)
    {
        parent::__construct($createinfo, $namespacesinroot);

        if (!$this->rootNamespaces()) {
            $this->contactobject->setAttribute('xmlns:contact', 'http://www.domreg.lt/epp/xml/domreg-contact-1.1');
        }
    }

    /**
     * @param $contactid
     * @return void
     */
    public function setContactId($contactid)
    {
        // Do nothing.
    }

    /**
     * @param $password
     * @return void
     */
    public function setPassword($password) {
        // Do nothing.
    }

    /**
     * @param domregEppContact $contact
     * @return void
     * @throws eppException
     */
    public function setContact(eppContact $contact)
    {
        parent::setContact($contact);

        if ($orgCode = $contact->getOrgCode()) {
            $this->setOrgCode($orgCode);
        }
        
        $this->setRole($contact->getRole());
    }

    /**
     * @param $role
     * @return void
     */
    public function setRole($role)
    {
        $this->contactobject->appendChild($this->createElement('contact:role', $role));
    }

    /**
     * @param $orgCode
     * @return void
     */
    public function setOrgCode($orgCode)
    {
        $this->contactobject->appendChild($this->createElement('contact:orgcode', $orgCode));
    }
}
