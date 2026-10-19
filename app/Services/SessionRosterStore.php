
<?php

namespace App\Services;

use App\Contracts\RosterStore;

class SessionRosterStore implements RosterStore 
{
    private string $sessionKey = 'roster_data';

    public function get(): array
    {
        return session()->get($this->sessionKey, []);
    } 

    public function assign(string $day, string $shift, int $employeeId): void
    {
        $roster = $this->get();   
        $roster[$day][$shift] = $employeeId;
        session()->put($this->sessionKey, $roster);
    }

    public function remove(string $day, string $shift): void
    {
        $roster = $this->get();
        if (isset($roster[$day][$shift])) {
            unset($roster[$day][$shift]);
            session()->put($this->sessionKey, $roster);
        }
    }

    public function clear(): void
    {
        session()->forget($this->sessionKey);
    }
}