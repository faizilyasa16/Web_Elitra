<?php
namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class KaryawanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }
    public function build(array $pendaftarCount): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->addData(array_values($pendaftarCount)) // jumlah orangnya
            ->setLabels(array_keys($pendaftarCount)) // nama posisi
            ->setColors(['#1E90FF', '#FF6347', '#FFD700', '#FFC0CB']);// Sesuaikan warna bagian

    }
    
    
}
