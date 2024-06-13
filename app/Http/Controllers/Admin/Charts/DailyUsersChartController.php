<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

/**
 * Class DailyUsersChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DailyUsersChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();
        $this->chart->displayAxes(false);
        $this->chart->minimalist(true);
        $this->chart->displayLegend(false);
        $this->chart->options([
            'layout' => [
                'padding' => [
                    'top' => 10,
                ],
            ],
        ]);
        $numbers = array_reverse(range(0, 29));
        $numbersWithDaysAgo = [];
        foreach ($numbers as $number) {
            if ($number == 0) {
                $numbersWithDaysAgo[] = 'Today';
                continue;
            }
            if ($number == 1) {
                $numbersWithDaysAgo[] = 'Yesterday';
                continue;
            }
            $numbersWithDaysAgo[] = $number . ' days ago';
        }
        $this->chart->labels($numbersWithDaysAgo);
        // Red color chart
        $this->chart->dataset('Users', 'line', $this->getDailyUsers())->color('rgba(255, 99, 132, 1)')->backgroundColor('rgba(255, 99, 132, 0.2)');
    }

    protected function getDailyUsers()
    {
        $dailyUsers = [];
        for ($i = 0; $i < 30; $i++) {
            $dailyUsers[] = User::whereDate('created_at', today()->subDays($i))->count();
        }
        return array_reverse($dailyUsers);
    }

}
