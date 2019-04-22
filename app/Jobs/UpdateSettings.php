<?php

namespace App\Jobs;

use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use App\Helpers\Data\PhoneNumber;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateSettings implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 1;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 30;

    /**
     * The user to update.
     *
     * @var User
     */
    protected $user;

    /**
     * The request data.
     *
     * @var array
     */
    protected $data;

    /**
     * Create a new job instance.
     *
     * @param array $data
     * @param User $user
     * @return void
     */
    public function __construct(User $user, array $data)
    {
        $this->user = $user;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->user->update([
            'first_name'    => $this->data['first_name'],
            'last_name'     => $this->data['last_name'],
            'email'         => $this->data['email'],
            'dob'           => Carbon::parse($this->data['dob'])->toDateString(),
            'gender'        => $this->data['gender'],
            'bio'           => $this->data['bio'],
            'social'        => $this->collectSocialLinks($this->data['social']) ?? [],
            'profile_image' => $this->data['profile_image'] ?? null,
        ]);

        $this->user->phoneNumber()->update([
            'phone_number' => PhoneNumber::clean($this->data['phone_number']),
        ]);

        $this->user->address()->update([
            'address' => $this->data['address'],
            'city'    => $this->data['city'],
            'state'   => $this->data['state'],
            'zip'     => $this->data['zip'],
        ]);
    }

    /**
     * Collect the social usernames.
     *
     * @param array $data
     * @return array
     */
    private function collectSocialLinks(array $data): array
    {
        $social = collect();

        foreach ($data as $channel => $username) {
            $social->put($channel, $username);
        }

        return $social->toArray();
    }
}
