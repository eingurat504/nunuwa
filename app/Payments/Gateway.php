<?php

namespace App\Payments;

use App\Models\Order;
use Symfony\Component\HttpFoundation\Response;

interface Gateway
{
    /**
     * Process payment.
     * Update order payment status, and order status.
     *
     * @param \App\Models\Order $order
     * @param array             $options
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function process(Order $order, array $options = []): Response;
}
