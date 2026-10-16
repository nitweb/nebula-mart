<?php

/**
 * Delivery locations for checkout. District names must match the list on the checkout page.
 * The delivery zone is worked out from the district: Dhaka is inside Dhaka, the NEARBY districts are
 * nearby Dhaka, everything else is outside Dhaka.
 */
return [
    'inside_dhaka' => ['Dhaka'],

    'nearby_dhaka' => ['Gazipur', 'Narayanganj', 'Narsingdi', 'Munshiganj', 'Manikganj'],

    'divisions' => [
        'Dhaka' => ['Dhaka', 'Gazipur', 'Narayanganj', 'Narsingdi', 'Manikganj', 'Munshiganj', 'Tangail', 'Kishoreganj', 'Faridpur', 'Gopalganj', 'Madaripur', 'Rajbari', 'Shariatpur'],
        'Chattogram' => ['Chattogram', "Cox's Bazar", 'Cumilla', 'Feni', 'Brahmanbaria', 'Noakhali', 'Lakshmipur', 'Chandpur', 'Rangamati', 'Bandarban', 'Khagrachhari'],
        'Rajshahi' => ['Rajshahi', 'Bogura', 'Pabna', 'Sirajganj', 'Natore', 'Naogaon', 'Chapainawabganj', 'Joypurhat'],
        'Khulna' => ['Khulna', 'Jashore', 'Satkhira', 'Bagerhat', 'Kushtia', 'Jhenaidah', 'Magura', 'Narail', 'Chuadanga', 'Meherpur'],
        'Barishal' => ['Barishal', 'Bhola', 'Patuakhali', 'Pirojpur', 'Jhalokathi', 'Barguna'],
        'Sylhet' => ['Sylhet', 'Moulvibazar', 'Habiganj', 'Sunamganj'],
        'Rangpur' => ['Rangpur', 'Dinajpur', 'Gaibandha', 'Kurigram', 'Lalmonirhat', 'Nilphamari', 'Panchagarh', 'Thakurgaon'],
        'Mymensingh' => ['Mymensingh', 'Jamalpur', 'Netrokona', 'Sherpur'],
    ],
];
