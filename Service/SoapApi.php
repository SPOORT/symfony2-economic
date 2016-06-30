<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Service;

class SoapApi
{
    /** @var string $soapWsdlUrl */
    protected $soapWsdlUrl;

    /** @var string $soapAgreementNumber */
    protected $soapAgreementNumber;

    /** @var string $soapUsername */
    protected $soapUsername;

    /** @var string $soapPassword */
    protected $soapPassword;

    /** @var string $soapToken */
    protected $soapToken;

    /** @var string $soapAppToken */
    protected $soapAppToken;

    /** @var \SoapClient $soapClient */
    protected $soapClient;

    /**
     * SoapApi constructor
     * @param array $options
     */
    public function __construct(array $options)
    {
        $config = $options['symfony2_economic_config'];

        $this->soapWsdlUrl = $config['wsdl_url'];

        $this->soapAgreementNumber = $config['agreement_number'];
        $this->soapUsername = $config['username'];
        $this->soapPassword = $config['password'];

        $this->soapToken = $config['token'];
        $this->soapAppToken = $config['app_token'];

        // Create SOAPClient request
        $this->soapClient = new \SoapClient($this->soapWsdlUrl, ['trace' => 1, 'exceptions' => 1]);
    }

    /**
     * Get connection
     */
    public function getConnection()
    {
        if (null !== $this->soapToken && null !== $this->soapAppToken) {
            // Let's connect via Token
            $this->soapClient
                 ->ConnectWithToken(['token' => $this->soapToken,
                                     'appToken' => $this->soapAppToken]);
        } elseif (null !== $this->soapUsername && null !== $this->soapPassword) {
            $this->soapClient
                 ->Connect(['agreementNumber' => $this->soapAgreementNumber,
                            'userName' => $this->soapUsername,
                            'password' => $this->soapPassword]);
        } else {
            throw new \InvalidArgumentException('SOAP credentials are not provided!');
        }

    }
}