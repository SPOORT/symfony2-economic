<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Service;

use DateTime;
use SoapClient;

class SoapApi
{
    const CONNECTION_TOKEN_VALIDITY = '4 hours ago';

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

    /** @var SoapClient $soapClient */
    protected $soapClient;

    /** @var DateTime $connectedTime */
    protected $connectedDatetime;

    /**
     * SoapApi constructor
     *
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
    }

    /**
     * Get connection
     *
     * @return SoapClient
     */
    public function getConnection()
    {
        if (!$this->hasValidConnection()) {
            $this->createConnection();
        }

        return $this->soapClient;
    }

    /**
     * Determines whether we have a valid soap client and token cookies.
     *
     * @return bool
     */
    protected function hasValidConnection()
    {
        return null !== $this->soapClient
            && null !== $this->connectedDatetime
            && $this->connectedDatetime > new DateTime(self::CONNECTION_TOKEN_VALIDITY);
    }

    /**
     * Creates a new soap client and "connects" to economic to get token cookies.
     */
    protected function createConnection()
    {
        $this->soapClient = new SoapClient($this->soapWsdlUrl, ['trace' => 1, 'exceptions' => 1]);

        if (null !== $this->soapToken && null !== $this->soapAppToken) {
            // Let's connect via Token
            $this->soapClient
                ->ConnectWithToken([
                    'token' => $this->soapToken,
                    'appToken' => $this->soapAppToken,
                ]);
        } elseif (null !== $this->soapUsername && null !== $this->soapPassword) {
            // Let's connect with agreement_number, username and password
            $this->soapClient
                ->Connect([
                    'agreementNumber' => $this->soapAgreementNumber,
                    'userName' => $this->soapUsername,
                    'password' => $this->soapPassword,
                ]);
        } else {
            throw new \InvalidArgumentException('SOAP credentials are not provided!');
        }

        $this->connectedDatetime = new DateTime();
    }
}
