<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Stock;
use App\Eoq;
use App\Cost;
use App\StockNr;
use Carbon\Carbon;

class EoqController extends Controller
{
    public function store(){
        $now=Carbon::now()->format('Y');

        $costs=Cost::all();
        $totalH=0;
        $totalC=0;
        foreach($costs as $cost)
        {
            if($cost->category=="Holding Cost")
            $totalH+=$cost->amount;
            elseif ($cost->category=="Ordering Cost")
            $totalC+=$cost->amount;
        }

        $show=true;
        $eoqs=EOQ::all();
        $update=false;
        if($eoqs->count()>0)
        {
            foreach($eoqs as $neweoq)
            if($neweoq->year==$now){
                $demand=$neweoq->getDemand();
                $hc=$neweoq->getHC();
                $oc=$neweoq->getOC();
                $eoq=$neweoq->computeEOQ($demand,$oc,$hc);
                $neweoq->setYear();
                $neweoq->update();
                $update=true;
            }
        }
        if($update==false)
        {
        $neweoq=new Eoq;
        $demand=$neweoq->getDemand();
        $hc=$neweoq->getHC();
        $oc=$neweoq->getOC();
        $eoq=$neweoq->computeEOQ($demand,$oc,$hc);
        $neweoq->setYear();
        $neweoq->save();
        }
        // return view('inventory.cost',compact('eoq'));
        return view("/inventory/cost",compact('neweoq','costs','totalH','totalC','show'));
    }
}
