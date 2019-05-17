<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pinjaman;

class pinjamanController extends Controller
{
    public function hasil(Request $request) 
    {
    	$pinjam = $request->input('pinjaman');
    	$pinjam = filter_var($pinjam, FILTER_SANITIZE_NUMBER_INT);
    	$pinjam = $pinjam / 100;
    	$model = Pinjaman::all();
    	$filter = array();
    	foreach ($model as $m) {
    		if (($m->min_pinjaman <= $pinjam || $m->min_pinjaman == null) && ($m->max_pinjaman >= $pinjam || $m->max_pinjaman == null)) {
    			array_push($filter,$m);
    		}
    	}

    	$hasil = array();

    	foreach ($filter as $f) {
    		$h = new \stdClass();
				$h->name = $f->name;
				$h->syarat = $f->syarat;
				$h->contoh = $f->angsuran;
				$h->bulan1 = new \stdClass();
				$h->bulan3 = new \stdClass();
				$h->bulan6 = new \stdClass();
				$h->bulan12 = new \stdClass();
				$biaya_awal = null;
    		if ($f->case == 0) {
    			if ($f->biaya_awal !== null) {
    				$biaya_awal = $f->biaya_awal;
    			} else {
    				$biaya_awal = 0;
    			}
    			$h->biaya_awal = $biaya_awal;
    			if ($f->bungaPerHari == null) {
    				$bunga = ($pinjam * $f->bungaPerBulan);
    				$total = $pinjam + $bunga + $biaya_awal;
    				$h->bulan1->bunga = $bunga;
    				$h->bulan1->total = $total;
    				$h->bulan1->cicilanPerBulan = ($pinjam + $bunga) / 1;
    			} else {
    				$bunga = ($pinjam * $f->bungaPerHari * 30);
    				$total = $pinjam + $bunga + $biaya_awal;
    				$h->bulan1->bunga = $bunga;
    				$h->bulan1->total = $total;
    				$h->bulan1->cicilanPerBulan = ($pinjam + $bunga) / 1;
    			}
    			if ($f->bungaPerHari == null) {
    				$bunga = ($pinjam * $f->bungaPerBulan) * 3;
    				$total = $pinjam + $bunga + $biaya_awal;
    				$h->bulan3->bunga = $bunga;
    				$h->bulan3->total = $total;
    				$h->bulan3->cicilanPerBulan = ($pinjam + $bunga) / 3;
    			} else {
    				$bunga = ($pinjam * $f->bungaPerHari * 90);
    				$total = $pinjam + $bunga + $biaya_awal;
    				$h->bulan3->bunga = $bunga;
    				$h->bulan3->total = $total;
    				$h->bulan3->cicilanPerBulan = ($pinjam + $bunga) / 3;
    			}
    			if ($f->bungaPerHari == null) {
    				$bunga = ($pinjam * $f->bungaPerBulan) * 6;
    				$total = $pinjam + $bunga + $biaya_awal;
    				$h->bulan6->bunga = $bunga;
    				$h->bulan6->total = $total;
    				$h->bulan6->cicilanPerBulan = ($pinjam + $bunga) / 6;
    			} else {
    				$bunga = ($pinjam * $f->bungaPerHari * 180);
    				$total = $pinjam + $bunga + $biaya_awal;
    				$h->bulan6->bunga = $bunga;
    				$h->bulan6->total = $total;
    				$h->bulan6->cicilanPerBulan = ($pinjam + $bunga) / 6;
    			}
    			if ($f->bungaPerHari == null) {
    				$bunga = ($pinjam * $f->bungaPerBulan) * 12;
    				$total = $pinjam + $bunga + $biaya_awal;
    				$h->bulan12->bunga = $bunga;
    				$h->bulan12->total = $total;
    				$h->bulan12->cicilanPerBulan = ($pinjam + $bunga) / 12;
    			} else {
    				$bunga = ($pinjam * $f->bungaPerHari * 360);
    				$total = $pinjam + $bunga + $biaya_awal;
    				$h->bulan12->bunga = $bunga;
    				$h->bulan12->total = $total;
    				$h->bulan12->cicilanPerBulan = ($pinjam + $bunga) / 12;
    			}
    			array_push($hasil, $h);
    		}
    	}

    	return view('hasil', ['hasil' => $hasil, 'pinjaman' => $pinjam]);
    }
}
