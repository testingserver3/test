<?php

namespace App\Providers;

use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'Maybe*',
        'product' => 'Maybe* for business',
        'street' => 'The Growth Hub',
        'location' => 'Glocuester, GL2 9HW',
        'phone' => '0800 061 4214',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = 'help@maybexyz.com';

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        'paul@maybe.xyz'
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
        Spark::useStripe()->noCardUpFront()->trialDays(10);

        Spark::freePlan()
            ->features([
                'First', 'Second', 'Third'
            ]);

        Spark::plan('Starter', 'Maybe-Pro')
            ->price(19.99)
            ->features([
                'First', 'Second', 'Third'
            ]);

        Spark::plan('Managed', 'Maybe-Managed')
            ->price(2500)
            ->features([
                'First', 'Second', 'Third'
            ]);
    }
}
