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

    /** @var boolean $connected */
    protected $connected;

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

        $this->soapClient = new \SoapClient($this->soapWsdlUrl, ['trace' => 1, 'exceptions' => 1]);
    }

    /**
     * Get connection
     * @return \SoapClient
     */
    public function getConnection()
    {
        if (!$this->connected) {

            if (null !== $this->soapToken && null !== $this->soapAppToken) {
                // Let's connect via Token
                $this->soapClient
                     ->ConnectWithToken(['token' => $this->soapToken,
                                         'appToken' => $this->soapAppToken]);

            } elseif (null !== $this->soapUsername && null !== $this->soapPassword) {
                // Let's connect with agreement_number, username and password
                $this->soapClient
                     ->Connect(['agreementNumber' => $this->soapAgreementNumber,
                                'userName' => $this->soapUsername,
                                'password' => $this->soapPassword]);

            } else {
                throw new \InvalidArgumentException('SOAP credentials are not provided!');
            }
            $this->connected = true;
        }

        return $this->soapClient;
    }
}