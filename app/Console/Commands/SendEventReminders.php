<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use App\Models\Member;
use App\Services\SmsService;
use Carbon\Carbon;

class SendEventReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'events:send-reminders';
    

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send sms reminders for upcoming events';

    /**
     * Execute the console command.
     */
    protected SmsService $smsService; 

    public function __construct(SmsService $smsService)
    {
        parent::__construct();
        $this->smsService = $smsService;
    }


    public function handle()
    {
        $now = Carbon::now();

        $events = Event::whereDate('event_date', '>=', $now->toDateString())->get();

        foreach ($events as $event) {
            $eventTime = Carbon::parse($event->event_date . ' ' . $event->event_time);

            foreach ($event->reminder_intervals ?? [] as $minutesBefore) {
                if ($now->between($eventTime->copy()->subMinutes($minutesBefore), $eventTime)) {
                    $this->sendReminder($event);
                }
            }
        }
    }

    private function sendReminder(Event $event)
    {
        $query = Member::query();

        foreach ($event->filters as $column => $value) {
            $query->where($column, $value);
        }

        $recipients = $query->pluck('phone')->toArray();
        // $jina = $query->pluck('last_name')->toArray();

        if (!empty($recipients)) {
            $this->smsService->sendSms($recipients, "Mungu akubariki Ndugu/Dada unakumbushwa : {$event->title} tarehe {$event->event_date} saa {$event->event_time}, {$event->location}.");
        }
    }
}
