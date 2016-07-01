<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity\Enum;


class CashBookEntryType
{
    const DEBTOR_PAYMENT = 'DebtorPayment';
    const CREDITOR_INVOICE = 'CreditorInvoice';
    const CREDITOR_PAYMENT = 'CreditorPayment';
    const FINANCE_VOUCHER = 'FinanceVoucher';
    const MANUAL_DEBTOR_INVOICE = 'ManualDebtorInvoice';
}