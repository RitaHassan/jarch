<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(\Slides\Saml2\Events\SignedIn::class, function (\Slides\Saml2\Events\SignedIn $event) {
            $messageId = $event->getAuth()->getLastMessageId();
            
            // your own code preventing reuse of a $messageId to stop replay attacks

            $samlUser = $event->getSaml2User();
            $attributes = $samlUser->getAttributes();

            session(
                [
                    'logged_in' => true,
                    'user_id' => $attributes['UserIdentity'][0],
                    'user_name' => $attributes['Name'][0],
                    'user_mobile' => $attributes['Mobile'][0] ?? null,
                    'user_ministry_code' => $attributes['MINISTRY_CD'][0] ?? null,
                    'user_ministry_name' => $attributes['MINISTRY_NAME'][0] ?? null,
                ]
            );
        });

        Event::listen('Slides\Saml2\Events\SignedOut', function (\Slides\Saml2\Events\SignedOut $event) {
            session(['logged_in' => false]);
            \Illuminate\Support\Facades\Session::save();
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
