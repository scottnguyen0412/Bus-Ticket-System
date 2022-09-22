<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailNotifyContract;


class SendMailContact implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $contact;
    protected $admin_receiver;

    public function __construct($contact, $admin_receiver)
    {
        $this->contact = $contact;
        $this->admin_receiver = $admin_receiver;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->admin_receiver as $receivers) {
        Mail::to($receivers->email)->send(new SendMailNotifyContract($receivers, $this->contact));
        }
    }
}
