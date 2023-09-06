<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\RadarChart
    {
        return $this->chart->radarChart()
            ->setTitle('Hasil Evaluasi SPBE')
            ->setSubtitle('Tahun 2023.')
            ->addData('Stats', [1.5, 2.0, 3.2, 1.3, 2.5, 4, 1.8, 3.8])
            ->setXAxis(['Kebijakan Tata Kelola SPBE', 'Perencanann Strategis SPBE', 'Teknologi Informasi dan Komunikasi', 'Penyelenggara SPBE', 'Penerapan Manajemen SPBE', 'Audit TIK', 'Layanan AdPem Berbasis Elektronik', 'Layanan Public Berbasis Elektronik'])
            ->setMarkers(['#303F9F'], 7, 10);
    }
}
