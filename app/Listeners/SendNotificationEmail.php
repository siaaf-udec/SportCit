<?php

namespace App\Listeners;

use Exception;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailer;

/*Eventos*/
use App\Events\StateOrganizationModified;

class SendNotificationEmail implements ShouldQueue
{
    private $mailer;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  StateOrganizationModified  $event
     * @return void
     */
    public function handle(StateOrganizationModified $event)
    {
        $data = ['link' => 'http://styde.net'];
        $this->mailer->send('welcome', $data, function ($message) {
            $message->from('email@styde.net', 'Styde.Net');
            $message->to('user@example.com')->subject('Notificación');
        });
    }
    /**
     * The job failed to process.
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed(Exception $exception)
    {
        // Send user notification of failure, etc...
    }
}
