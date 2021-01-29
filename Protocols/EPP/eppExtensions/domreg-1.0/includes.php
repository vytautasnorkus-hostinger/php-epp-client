<?php

include_once(dirname(__FILE__) . '/eppRequests/domregEppInfoDomainRequest.php');
include_once(dirname(__FILE__) . '/eppResponses/domregEppInfoDomainResponse.php');

include_once(dirname(__FILE__) . '/eppRequests/domregEppUpdateContactRequest.php');

$this->addCommandResponse(\Metaregistrar\EPP\domregEppInfoDomainRequest::class, \Metaregistrar\EPP\domregEppInfoDomainResponse::class);

$this->addCommandResponse(\Metaregistrar\EPP\domregEppUpdateContactRequest::class, \Metaregistrar\EPP\eppUpdateContactResponse::class);
