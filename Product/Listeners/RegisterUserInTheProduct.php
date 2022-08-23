<?php

namespace Gym\Product\Listeners;

use Gym\Service\Models\Product;
use Gym\Service\Repositories\ProductRepo;

class RegisterUserInTheProduct
{
    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        if ($event->payment->paymentable_type == Product::class) {
            resolve(ProductRepo::class)->addCustomerToProduct
            ($event->payment->paymentable, $event->payment->buyer_id);
        }
    }
}
