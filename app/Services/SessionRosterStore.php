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
      $roster = session()->get('roster', []);
    $roster[$day][$shift] = $employeeId;
    session()->put('roster', $roster);
    }

    public function remove(string $day, string $shift): void
    {
        $roster = $this->get();
        if (isset($roster[$day][$shift])) {
            $this->saveToHistory();

            unset($roster[$day][$shift]);
            session()->put($this->sessionKey, $roster);
        }
    }

    public function clear(): void
    {
        $this->saveToHistory();
        session()->forget($this->sessionKey);
    }

    public function undo(): void
    {
        $history = session()->get('roster_history', []);
        if (!empty($history)) {
            $previousRoster = array_pop($history);
            session()->put('roster_history', $history);
            session()->put($this->sessionKey, $previousRoster);
        }
    }

    private function saveToHistory(): void
    {
        $history = session()->get('roster_history', []);
        $history[] = $this->get();
        session()->put('roster_history', $history);
    }
}