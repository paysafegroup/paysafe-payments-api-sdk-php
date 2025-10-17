<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\StandaloneCredit;

use Paysafe\PhpSdk\Model\Applepay\ApplePayTokenDetails;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Card\CardExpiry;
use Paysafe\PhpSdk\Model\Card\ExternalNetworkTokenRequest;
use Paysafe\PhpSdk\Model\Card\ThreeDs\BrowserDetails;
use Paysafe\PhpSdk\Model\Common\DeviceDetails;
use Paysafe\PhpSdk\Model\Common\Mandate;
use Paysafe\PhpSdk\Model\Common\ReturnLink;
use Paysafe\PhpSdk\Model\Lpm\Ach;
use Paysafe\PhpSdk\Model\Lpm\Bacs;
use Paysafe\PhpSdk\Model\Lpm\Eft;
use Paysafe\PhpSdk\Model\Lpm\Interac;
use Paysafe\PhpSdk\Model\Lpm\Mazooma;
use Paysafe\PhpSdk\Model\Lpm\Neteller;
use Paysafe\PhpSdk\Model\Lpm\Paypal;
use Paysafe\PhpSdk\Model\Lpm\RapidTransfer;
use Paysafe\PhpSdk\Model\Lpm\Sepa;
use Paysafe\PhpSdk\Model\Lpm\Sightline;
use Paysafe\PhpSdk\Model\Lpm\Skrill;
use Paysafe\PhpSdk\Model\Lpm\Skrill1Tap;
use Paysafe\PhpSdk\Model\Lpm\SkrillPaymentGatewayResponse;
use Paysafe\PhpSdk\Model\Lpm\Venmo;
use Paysafe\PhpSdk\Model\Lpm\Vippreferred;

/**
 * StandaloneCreditPaymentInstrumentInner
 */
class StandaloneCreditPaymentInstrumentInner extends BaseModel
{

	private string $cardNum;
	private string $cardId;
	private CardExpiry $cardExpiry;
	private string $cvv;
	private string $holderName;
	private string $cardType;
	private string $lastDigits;
	private string $cardBin;
	private string $issuingCountry;
	private string $status;
	private ApplePayTokenDetails $applePay;
	private string $tokenType;
	private ExternalNetworkTokenRequest $networkToken;
	private Skrill $skrill;
	private SkrillPaymentGatewayResponse $gatewayResponse;
	private Neteller $neteller;
	private Paypal $payPal;
	private array $returnLinks;
	private Venmo $venmo;
	private Vippreferred $vippreferred;
	private Mazooma $mazooma;
	private Sightline $sightline;
	private Interac $interacETransfer;
	private ?BrowserDetails $browserDetails = null;
	private DeviceDetails $deviceDetails;
	private RapidTransfer $rapidTransfer;
	private Skrill1Tap $skrill1Tap;
	private Ach $ach;
	private Eft $eft;
	private bool $dupCheck;
	private Bacs $bacs;
	private ?array $mandates = null;
	private Sepa $sepa;

	/**
	 * Builder function for cardNum
	 * 
	 * @param string $cardNum
	 * 
	 * @return $this
	 */
	public function cardNum(string $cardNum): self
	{
		$this->setCardNum($cardNum);
		
		return $this;
	}

	/**
	 * Setter function for cardNum
	 * 
	 * @param string $cardNum
	 * 
	 * @return void
	 */
	public function setCardNum(string $cardNum): void
	{
		$this->cardNum = $cardNum;
	}

	/**
	 * This is the card number used for the request.
	 * 
	 * @return string
	 */
	public function getCardNum(): string
	{
		return $this->cardNum;
	}

	/**
	 * Builder function for cardId
	 * 
	 * @param string $cardId
	 * 
	 * @return $this
	 */
	public function cardId(string $cardId): self
	{
		$this->setCardId($cardId);
		
		return $this;
	}

	/**
	 * Setter function for cardId
	 * 
	 * @param string $cardId
	 * 
	 * @return void
	 */
	public function setCardId(string $cardId): void
	{
		$this->cardId = $cardId;
	}

	/**
	 * This is the card id returned in the response during save card flow.
	 * 
	 * @return string
	 */
	public function getCardId(): string
	{
		return $this->cardId;
	}

	/**
	 * Builder function for cardExpiry
	 * 
	 * @param CardExpiry $cardExpiry
	 * 
	 * @return $this
	 */
	public function cardExpiry(CardExpiry $cardExpiry): self
	{
		$this->setCardExpiry($cardExpiry);
		
		return $this;
	}

	/**
	 * Setter function for cardExpiry
	 * 
	 * @param CardExpiry $cardExpiry
	 * 
	 * @return void
	 */
	public function setCardExpiry(CardExpiry $cardExpiry): void
	{
		$this->cardExpiry = $cardExpiry;
	}

	/**
	 * This is the card's expiry date.
	 * 
	 * @return CardExpiry
	 */
	public function getCardExpiry(): CardExpiry
	{
		return $this->cardExpiry;
	}

	/**
	 * Builder function for cvv
	 * 
	 * @param string $cvv
	 * 
	 * @return $this
	 */
	public function cvv(string $cvv): self
	{
		$this->setCvv($cvv);
		
		return $this;
	}

	/**
	 * Setter function for cvv
	 * 
	 * @param string $cvv
	 * 
	 * @return void
	 */
	public function setCvv(string $cvv): void
	{
		$this->cvv = $cvv;
	}

	/**
	 * This is the 3- or 4-digit security code that appears on the card following the card number.
	 * 
	 * @return string
	 */
	public function getCvv(): string
	{
		return $this->cvv;
	}

	/**
	 * Builder function for holderName
	 * 
	 * @param string $holderName
	 * 
	 * @return $this
	 */
	public function holderName(string $holderName): self
	{
		$this->setHolderName($holderName);
		
		return $this;
	}

	/**
	 * Setter function for holderName
	 * 
	 * @param string $holderName
	 * 
	 * @return void
	 */
	public function setHolderName(string $holderName): void
	{
		$this->holderName = $holderName;
	}

	/**
	 * This is the name of the card holder. Holder name must contain only Latin characters (English
	 * Alphabet), Space, Apostrophe('), Dot(.) or Hyphen(-).<br />
	 * Unicode normalization is done.
	 * 
	 * @return string
	 */
	public function getHolderName(): string
	{
		return $this->holderName;
	}

	/**
	 * Builder function for cardType
	 * 
	 * @param string $cardType
	 * 
	 * @return $this
	 */
	public function cardType(string $cardType): self
	{
		$this->setCardType($cardType);
		
		return $this;
	}

	/**
	 * Setter function for cardType
	 * 
	 * @param string $cardType
	 * 
	 * @return void
	 */
	public function setCardType(string $cardType): void
	{
		$this->cardType = $cardType;
	}

	/**
	 * This is type of card used for the request
	 * 
	 * @return string
	 */
	public function getCardType(): string
	{
		return $this->cardType;
	}

	/**
	 * Builder function for lastDigits
	 * 
	 * @param string $lastDigits
	 * 
	 * @return $this
	 */
	public function lastDigits(string $lastDigits): self
	{
		$this->setLastDigits($lastDigits);
		
		return $this;
	}

	/**
	 * Setter function for lastDigits
	 * 
	 * @param string $lastDigits
	 * 
	 * @return void
	 */
	public function setLastDigits(string $lastDigits): void
	{
		$this->lastDigits = $lastDigits;
	}

	/**
	 * These are the last four digits of the card used for the request.
	 * 
	 * @return string
	 */
	public function getLastDigits(): string
	{
		return $this->lastDigits;
	}

	/**
	 * Builder function for cardBin
	 * 
	 * @param string $cardBin
	 * 
	 * @return $this
	 */
	public function cardBin(string $cardBin): self
	{
		$this->setCardBin($cardBin);
		
		return $this;
	}

	/**
	 * Setter function for cardBin
	 * 
	 * @param string $cardBin
	 * 
	 * @return void
	 */
	public function setCardBin(string $cardBin): void
	{
		$this->cardBin = $cardBin;
	}

	/**
	 * These are the first 6 digits of the card Bank Identification Number (BIN),
     * for example: the first 6 digits of the card number.
	 * 
	 * @return string
	 */
	public function getCardBin(): string
	{
		return $this->cardBin;
	}

	/**
	 * Builder function for issuingCountry
	 * 
	 * @param string $issuingCountry
	 * 
	 * @return $this
	 */
	public function issuingCountry(string $issuingCountry): self
	{
		$this->setIssuingCountry($issuingCountry);
		
		return $this;
	}

	/**
	 * Setter function for issuingCountry
	 * 
	 * @param string $issuingCountry
	 * 
	 * @return void
	 */
	public function setIssuingCountry(string $issuingCountry): void
	{
		$this->issuingCountry = $issuingCountry;
	}

	/**
	 * This is the card issuing country.
	 * 
	 * @return string
	 */
	public function getIssuingCountry(): string
	{
		return $this->issuingCountry;
	}

	/**
	 * Builder function for status
	 * 
	 * @param string $status
	 * 
	 * @return $this
	 */
	public function status(string $status): self
	{
		$this->setStatus($status);
		
		return $this;
	}

	/**
	 * Setter function for status
	 * 
	 * @param string $status
	 * 
	 * @return void
	 */
	public function setStatus(string $status): void
	{
		$this->status = $status;
	}

	/**
	 * Optional.  Present only if the card is part of a Customer.
	 * 
	 * @return string
	 */
	public function getStatus(): string
	{
		return $this->status;
	}

	/**
	 * Builder function for applePay
	 * 
	 * @param ApplePayTokenDetails $applePay
	 * 
	 * @return $this
	 */
	public function applePay(ApplePayTokenDetails $applePay): self
	{
		$this->setApplePay($applePay);
		
		return $this;
	}

	/**
	 * Setter function for applePay
	 * 
	 * @param ApplePayTokenDetails $applePay
	 * 
	 * @return void
	 */
	public function setApplePay(ApplePayTokenDetails $applePay): void
	{
		$this->applePay = $applePay;
	}

	/**
	 * When tokenType=APPLE_PAY. Apple Pay token information.
     * Returned when the stored payment method is an Apple Pay token.
	 * 
	 * @return ApplePayTokenDetails
	 */
	public function getApplePay(): ApplePayTokenDetails
	{
		return $this->applePay;
	}

	/**
	 * Builder function for tokenType
	 * 
	 * @param string $tokenType
	 * 
	 * @return $this
	 */
	public function tokenType(string $tokenType): self
	{
		$this->setTokenType($tokenType);
		
		return $this;
	}

	/**
	 * Setter function for tokenType
	 * 
	 * @param string $tokenType
	 * 
	 * @return void
	 */
	public function setTokenType(string $tokenType): void
	{
		$this->tokenType = $tokenType;
	}

	/**
	 * Get tokenType. Possible value: NETWORK_TOKEN
	 * 
	 * @return string
	 */
	public function getTokenType(): string
	{
		return $this->tokenType;
	}

	/**
	 * Builder function for networkToken
	 * 
	 * @param ExternalNetworkTokenRequest $networkToken
	 * 
	 * @return $this
	 */
	public function networkToken(ExternalNetworkTokenRequest $networkToken): self
	{
		$this->setNetworkToken($networkToken);
		
		return $this;
	}

	/**
	 * Setter function for networkToken
	 * 
	 * @param ExternalNetworkTokenRequest $networkToken
	 * 
	 * @return void
	 */
	public function setNetworkToken(ExternalNetworkTokenRequest $networkToken): void
	{
		$this->networkToken = $networkToken;
	}

	/**
	 * Get networkToken
	 * 
	 * @return ExternalNetworkTokenRequest
	 */
	public function getNetworkToken(): ExternalNetworkTokenRequest
	{
		return $this->networkToken;
	}

	/**
	 * Builder function for skrill
	 * 
	 * @param Skrill $skrill
	 * 
	 * @return $this
	 */
	public function skrill(Skrill $skrill): self
	{
		$this->setSkrill($skrill);
		
		return $this;
	}

	/**
	 * Setter function for skrill
	 * 
	 * @param Skrill $skrill
	 * 
	 * @return void
	 */
	public function setSkrill(Skrill $skrill): void
	{
		$this->skrill = $skrill;
	}

	/**
	 * These are the details of the customer used for the transaction.
	 * 
	 * @return Skrill
	 */
	public function getSkrill(): Skrill
	{
		return $this->skrill;
	}

	/**
	 * Builder function for gatewayResponse
	 * 
	 * @param SkrillPaymentGatewayResponse $gatewayResponse
	 * 
	 * @return $this
	 */
	public function gatewayResponse(SkrillPaymentGatewayResponse $gatewayResponse): self
	{
		$this->setGatewayResponse($gatewayResponse);
		
		return $this;
	}

	/**
	 * Setter function for gatewayResponse
	 * 
	 * @param SkrillPaymentGatewayResponse $gatewayResponse
	 * 
	 * @return void
	 */
	public function setGatewayResponse(SkrillPaymentGatewayResponse $gatewayResponse): void
	{
		$this->gatewayResponse = $gatewayResponse;
	}

	/**
	 * This contains parameters returned by Skrill gateway
	 * 
	 * @return SkrillPaymentGatewayResponse
	 */
	public function getGatewayResponse(): SkrillPaymentGatewayResponse
	{
		return $this->gatewayResponse;
	}

	/**
	 * Builder function for neteller
	 * 
	 * @param Neteller $neteller
	 * 
	 * @return $this
	 */
	public function neteller(Neteller $neteller): self
	{
		$this->setNeteller($neteller);
		
		return $this;
	}

	/**
	 * Setter function for neteller
	 * 
	 * @param Neteller $neteller
	 * 
	 * @return void
	 */
	public function setNeteller(Neteller $neteller): void
	{
		$this->neteller = $neteller;
	}

	/**
	 * Neteller details to be used for the request
	 * 
	 * @return Neteller
	 */
	public function getNeteller(): Neteller
	{
		return $this->neteller;
	}

	/**
	 * Builder function for payPal
	 * 
	 * @param Paypal $payPal
	 * 
	 * @return $this
	 */
	public function payPal(Paypal $payPal): self
	{
		$this->setPayPal($payPal);
		
		return $this;
	}

	/**
	 * Setter function for payPal
	 * 
	 * @param Paypal $payPal
	 * 
	 * @return void
	 */
	public function setPayPal(Paypal $payPal): void
	{
		$this->payPal = $payPal;
	}

	/**
	 * These are the details of the PayPal account used for the transaction.
	 * 
	 * @return Paypal
	 */
	public function getPayPal(): Paypal
	{
		return $this->payPal;
	}

	/**
	 * Builder function for returnLinks
	 * 
	 * @param ReturnLink[] $returnLinks
	 * 
	 * @return $this
	 */
	public function returnLinks(array $returnLinks): self
	{
		$this->setReturnLinks($returnLinks);
		
		return $this;
	}

	/**
	 * Setter function for returnLinks
	 * 
	 * @param ReturnLink[] $returnLinks
	 * 
	 * @return void
	 */
	public function setReturnLinks(array $returnLinks): void
	{
		$this->returnLinks = $returnLinks;
	}

	/**
	 * The URL endpoints to redirect the customer to after a redirection to an alternative payment or 3D Secure site.
	 * You can customize the return URL based on the transaction status.
	 * 
	 * @return ReturnLink[]
	 */
	public function getReturnLinks(): array
	{
		return $this->returnLinks;
	}

	/**
	 * Add new returnLinksItem
	 * 
	 * @param ReturnLink $returnLinksItem
	 * 
	 * @return $this
	 */
	public function addReturnLinksItem(ReturnLink $returnLinksItem): self
	{
		if ($this->returnLinks === null) {
			$this->setReturnLinks([$returnLinksItem]);
			
			return $this;
		}
		
		$returnLinks = $this->getReturnLinks();
		$returnLinks[] = $returnLinksItem;
		$this->setReturnLinks($returnLinks);
		
		return $this;
	}

	/**
	 * Remove returnLinksItem
	 * 
	 * @param ReturnLink $returnLinksItem
	 * 
	 * @return $this
	 */
	public function removeReturnLinksItem(ReturnLink $returnLinksItem): self
	{
		$this->setReturnLinks(array_diff($this->getReturnLinks(), [$returnLinksItem]));
		
		return $this;
	}

	/**
	 * Builder function for venmo
	 * 
	 * @param Venmo $venmo
	 * 
	 * @return $this
	 */
	public function venmo(Venmo $venmo): self
	{
		$this->setVenmo($venmo);
		
		return $this;
	}

	/**
	 * Setter function for venmo
	 * 
	 * @param Venmo $venmo
	 * 
	 * @return void
	 */
	public function setVenmo(Venmo $venmo): void
	{
		$this->venmo = $venmo;
	}

	/**
	 * Get venmo
	 * 
	 * @return Venmo
	 */
	public function getVenmo(): Venmo
	{
		return $this->venmo;
	}

	/**
	 * Builder function for vippreferred
	 * 
	 * @param Vippreferred $vippreferred
	 * 
	 * @return $this
	 */
	public function vippreferred(Vippreferred $vippreferred): self
	{
		$this->setVippreferred($vippreferred);
		
		return $this;
	}

	/**
	 * Setter function for vippreferred
	 * 
	 * @param Vippreferred $vippreferred
	 * 
	 * @return void
	 */
	public function setVippreferred(Vippreferred $vippreferred): void
	{
		$this->vippreferred = $vippreferred;
	}

	/**
	 * These are the details of the vip preferred account used for the transaction.
	 * 
	 * @return Vippreferred
	 */
	public function getVippreferred(): Vippreferred
	{
		return $this->vippreferred;
	}

	/**
	 * Builder function for mazooma
	 * 
	 * @param Mazooma $mazooma
	 * 
	 * @return $this
	 */
	public function mazooma(Mazooma $mazooma): self
	{
		$this->setMazooma($mazooma);
		
		return $this;
	}

	/**
	 * Setter function for mazooma
	 * 
	 * @param Mazooma $mazooma
	 * 
	 * @return void
	 */
	public function setMazooma(Mazooma $mazooma): void
	{
		$this->mazooma = $mazooma;
	}

	/**
	 * Mazooma details to be used for the transaction
	 * 
	 * @return Mazooma
	 */
	public function getMazooma(): Mazooma
	{
		return $this->mazooma;
	}

	/**
	 * Builder function for sightline
	 * 
	 * @param Sightline $sightline
	 * 
	 * @return $this
	 */
	public function sightline(Sightline $sightline): self
	{
		$this->setSightline($sightline);
		
		return $this;
	}

	/**
	 * Setter function for sightline
	 * 
	 * @param Sightline $sightline
	 * 
	 * @return void
	 */
	public function setSightline(Sightline $sightline): void
	{
		$this->sightline = $sightline;
	}

	/**
	 * These are the details of the Play+ (Sightline) used for the transaction.
	 * 
	 * @return Sightline
	 */
	public function getSightline(): Sightline
	{
		return $this->sightline;
	}

	/**
	 * Builder function for interacETransfer
	 * 
	 * @param Interac $interacETransfer
	 * 
	 * @return $this
	 */
	public function interacETransfer(Interac $interacETransfer): self
	{
		$this->setInteracETransfer($interacETransfer);
		
		return $this;
	}

	/**
	 * Setter function for interacETransfer
	 * 
	 * @param Interac $interacETransfer
	 * 
	 * @return void
	 */
	public function setInteracETransfer(Interac $interacETransfer): void
	{
		$this->interacETransfer = $interacETransfer;
	}

	/**
	 * Details of the interac E-Transfer used for the transaction.
	 * 
	 * @return Interac
	 */
	public function getInteracETransfer(): Interac
	{
		return $this->interacETransfer;
	}

	/**
	 * Builder function for browserDetails
	 * 
	 * @param BrowserDetails $browserDetails
	 * 
	 * @return $this
	 */
	public function browserDetails(BrowserDetails $browserDetails): self
	{
		$this->setBrowserDetails($browserDetails);
		
		return $this;
	}

	/**
	 * Setter function for browserDetails
	 * 
	 * @param BrowserDetails $browserDetails
	 * 
	 * @return void
	 */
	public function setBrowserDetails(BrowserDetails $browserDetails): void
	{
		$this->browserDetails = $browserDetails;
	}

	/**
	 * Get browserDetails
	 * 
	 * @return BrowserDetails|null
	 */
	public function getBrowserDetails(): BrowserDetails
	{
		return $this->browserDetails;
	}

	/**
	 * Builder function for deviceDetails
	 * 
	 * @param DeviceDetails $deviceDetails
	 * 
	 * @return $this
	 */
	public function deviceDetails(DeviceDetails $deviceDetails): self
	{
		$this->setDeviceDetails($deviceDetails);
		
		return $this;
	}

	/**
	 * Setter function for deviceDetails
	 * 
	 * @param DeviceDetails $deviceDetails
	 * 
	 * @return void
	 */
	public function setDeviceDetails(DeviceDetails $deviceDetails): void
	{
		$this->deviceDetails = $deviceDetails;
	}

	/**
	 * For Interac e-Transfer withdrawal only.<br />
     * This is part of Interac e-Transfer withdrawal payment handle request.
	 * It is used for risk assessment by Interac. <br />
	 * This parameter is mandatory if browserDetails object
     * is not passed as a part of Interac e-Transfer withdrawal payment handle request.
	 * 
	 * @return DeviceDetails
	 */
	public function getDeviceDetails(): DeviceDetails
	{
		return $this->deviceDetails;
	}

	/**
	 * Builder function for rapidTransfer
	 * 
	 * @param RapidTransfer $rapidTransfer
	 * 
	 * @return $this
	 */
	public function rapidTransfer(RapidTransfer $rapidTransfer): self
	{
		$this->setRapidTransfer($rapidTransfer);
		
		return $this;
	}

	/**
	 * Setter function for rapidTransfer
	 * 
	 * @param RapidTransfer $rapidTransfer
	 * 
	 * @return void
	 */
	public function setRapidTransfer(RapidTransfer $rapidTransfer): void
	{
		$this->rapidTransfer = $rapidTransfer;
	}

	/**
	 * These are the details of the rapid transfer used for the transaction.
	 * 
	 * @return RapidTransfer
	 */
	public function getRapidTransfer(): RapidTransfer
	{
		return $this->rapidTransfer;
	}

	/**
	 * Builder function for skrill1Tap
	 * 
	 * @param Skrill1Tap $skrill1Tap
	 * 
	 * @return $this
	 */
	public function skrill1Tap(Skrill1Tap $skrill1Tap): self
	{
		$this->setSkrill1Tap($skrill1Tap);
		
		return $this;
	}

	/**
	 * Setter function for skrill1Tap
	 * 
	 * @param Skrill1Tap $skrill1Tap
	 * 
	 * @return void
	 */
	public function setSkrill1Tap(Skrill1Tap $skrill1Tap): void
	{
		$this->skrill1Tap = $skrill1Tap;
	}

	/**
	 * These are the details of the skrill 1-Tap account used for the transaction.
	 * 
	 * @return Skrill1Tap
	 */
	public function getSkrill1Tap(): Skrill1Tap
	{
		return $this->skrill1Tap;
	}

	/**
	 * Builder function for ach
	 * 
	 * @param Ach $ach
	 * 
	 * @return $this
	 */
	public function ach(Ach $ach): self
	{
		$this->setAch($ach);
		
		return $this;
	}

	/**
	 * Setter function for ach
	 * 
	 * @param Ach $ach
	 * 
	 * @return void
	 */
	public function setAch(Ach $ach): void
	{
		$this->ach = $ach;
	}

	/**
	 * Details of the ach account to be used for the transaction.
	 * 
	 * @return Ach
	 */
	public function getAch(): Ach
	{
		return $this->ach;
	}

	/**
	 * Builder function for eft
	 * 
	 * @param Eft $eft
	 * 
	 * @return $this
	 */
	public function eft(Eft $eft): self
	{
		$this->setEft($eft);
		
		return $this;
	}

	/**
	 * Setter function for eft
	 * 
	 * @param Eft $eft
	 * 
	 * @return void
	 */
	public function setEft(Eft $eft): void
	{
		$this->eft = $eft;
	}

	/**
	 * Details of the EFT account to be used for the transaction
	 * 
	 * @return Eft
	 */
	public function getEft(): Eft
	{
		return $this->eft;
	}

	/**
	 * Builder function for dupCheck
	 * 
	 * @param bool $dupCheck
	 * 
	 * @return $this
	 */
	public function dupCheck(bool $dupCheck): self
	{
		$this->setDupCheck($dupCheck);
		
		return $this;
	}

	/**
	 * Setter function for dupCheck
	 * 
	 * @param bool $dupCheck
	 * 
	 * @return void
	 */
	public function setDupCheck(bool $dupCheck): void
	{
		$this->dupCheck = $dupCheck;
	}

	/**
	 * Get dupCheck
	 * 
	 * @return bool
	 */
	public function getDupCheck(): bool
	{
		return $this->dupCheck;
	}

	/**
	 * Builder function for bacs
	 * 
	 * @param Bacs $bacs
	 * 
	 * @return $this
	 */
	public function bacs(Bacs $bacs): self
	{
		$this->setBacs($bacs);
		
		return $this;
	}

	/**
	 * Setter function for bacs
	 * 
	 * @param Bacs $bacs
	 * 
	 * @return void
	 */
	public function setBacs(Bacs $bacs): void
	{
		$this->bacs = $bacs;
	}

	/**
	 * Details of the bacs account to be used for the transaction.
	 * 
	 * @return Bacs
	 */
	public function getBacs(): Bacs
	{
		return $this->bacs;
	}

	/**
	 * Builder function for mandates
	 * 
	 * @param Mandate[] $mandates
	 * 
	 * @return $this
	 */
	public function mandates(array $mandates): self
	{
		$this->setMandates($mandates);
		
		return $this;
	}

	/**
	 * Setter function for mandates
	 * 
	 * @param Mandate[] $mandates
	 * 
	 * @return void
	 */
	public function setMandates(array $mandates): void
	{
		$this->mandates = $mandates;
	}

	/**
	 * Get mandates
	 * 
	 * @return Mandate[]|null
	 */
	public function getMandates(): array
	{
		return $this->mandates;
	}

	/**
	 * Add new mandatesItem
	 * 
	 * @param Mandate $mandatesItem
	 * 
	 * @return $this
	 */
	public function addMandatesItem(Mandate $mandatesItem): self
	{
		if ($this->mandates === null) {
			$this->setMandates([$mandatesItem]);
			
			return $this;
		}
		
		$mandates = $this->getMandates();
		$mandates[] = $mandatesItem;
		$this->setMandates($mandates);
		
		return $this;
	}

	/**
	 * Remove mandatesItem
	 * 
	 * @param Mandate $mandatesItem
	 * 
	 * @return $this
	 */
	public function removeMandatesItem(Mandate $mandatesItem): self
	{
		$this->setMandates(array_diff($this->getMandates(), [$mandatesItem]));
		
		return $this;
	}

	/**
	 * Builder function for sepa
	 * 
	 * @param Sepa $sepa
	 * 
	 * @return $this
	 */
	public function sepa(Sepa $sepa): self
	{
		$this->setSepa($sepa);
		
		return $this;
	}

	/**
	 * Setter function for sepa
	 * 
	 * @param Sepa $sepa
	 * 
	 * @return void
	 */
	public function setSepa(Sepa $sepa): void
	{
		$this->sepa = $sepa;
	}

	/**
	 * These are the details of the sepa account used for the transaction.
	 * 
	 * @return Sepa
	 */
	public function getSepa(): Sepa
	{
		return $this->sepa;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class StandaloneCreditPaymentInstrumentInner {" . PHP_EOL
			. "    cardNum: " . $this->toIndentedString($this->cardNum) . PHP_EOL
			. "    cardId: " . $this->toIndentedString($this->cardId) . PHP_EOL
			. "    cardExpiry: " . $this->toIndentedString($this->cardExpiry) . PHP_EOL
			. "    cvv: " . $this->toIndentedString($this->cvv) . PHP_EOL
			. "    holderName: " . $this->toIndentedString($this->holderName) . PHP_EOL
			. "    cardType: " . $this->toIndentedString($this->cardType) . PHP_EOL
			. "    lastDigits: " . $this->toIndentedString($this->lastDigits) . PHP_EOL
			. "    cardBin: " . $this->toIndentedString($this->cardBin) . PHP_EOL
			. "    issuingCountry: " . $this->toIndentedString($this->issuingCountry) . PHP_EOL
			. "    status: " . $this->toIndentedString($this->status) . PHP_EOL
			. "    applePay: " . $this->toIndentedString($this->applePay) . PHP_EOL
			. "    tokenType: " . $this->toIndentedString($this->tokenType) . PHP_EOL
			. "    networkToken: " . $this->toIndentedString($this->networkToken) . PHP_EOL
			. "    skrill: " . $this->toIndentedString($this->skrill) . PHP_EOL
			. "    gatewayResponse: " . $this->toIndentedString($this->gatewayResponse) . PHP_EOL
			. "    neteller: " . $this->toIndentedString($this->neteller) . PHP_EOL
			. "    payPal: " . $this->toIndentedString($this->payPal) . PHP_EOL
			. "    returnLinks: " . $this->toIndentedString($this->returnLinks) . PHP_EOL
			. "    venmo: " . $this->toIndentedString($this->venmo) . PHP_EOL
			. "    vippreferred: " . $this->toIndentedString($this->vippreferred) . PHP_EOL
			. "    mazooma: " . $this->toIndentedString($this->mazooma) . PHP_EOL
			. "    sightline: " . $this->toIndentedString($this->sightline) . PHP_EOL
			. "    interacETransfer: " . $this->toIndentedString($this->interacETransfer) . PHP_EOL
			. "    browserDetails: " . $this->toIndentedString($this->browserDetails) . PHP_EOL
			. "    deviceDetails: " . $this->toIndentedString($this->deviceDetails) . PHP_EOL
			. "    rapidTransfer: " . $this->toIndentedString($this->rapidTransfer) . PHP_EOL
			. "    skrill1Tap: " . $this->toIndentedString($this->skrill1Tap) . PHP_EOL
			. "    ach: " . $this->toIndentedString($this->ach) . PHP_EOL
			. "    eft: " . $this->toIndentedString($this->eft) . PHP_EOL
			. "    dupCheck: " . $this->toIndentedString($this->dupCheck) . PHP_EOL
			. "    bacs: " . $this->toIndentedString($this->bacs) . PHP_EOL
			. "    mandates: " . $this->toIndentedString($this->mandates) . PHP_EOL
			. "    sepa: " . $this->toIndentedString($this->sepa) . PHP_EOL
			. "}";
	}
}
