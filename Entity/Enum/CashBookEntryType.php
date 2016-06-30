<?php
/**
 * This file is part of SPOORT International ApS
 * and belongs to SPOORT International ApS.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Spoort\Bundle\Symfony2EconomicBundle\Entity\Enum;


class CashBookEntryType
{
    const DEBTOR_PAYMENT = 'DebtorPayment';
    const CREDITOR_INVOICE = 'CreditorInvoice';
    const CREDITOR_PAYMENT = 'CreditorPayment';
    const FINANCE_VOUCHER = 'FinanceVoucher';
    const MANUAL_DEBTOR_INVOICE = 'ManualDebtorInvoice';
}