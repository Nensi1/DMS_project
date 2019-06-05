<?php

namespace App;
use App\OrderLine;
use App\Cost;
use App\Stock;
use App\StockNr;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Eoq extends Model
{
    protected $fillable = [
        'hc','oc','demand','eoq','year' ];
        public $timestamps = false;

    public function computeEOQ($demand,$oc,$hc){
        if($hc==0)
        $this->eoq=0;
        else
        $this->eoq=round(sqrt(2*$demand*$oc/$hc));
    }
    public function getDemand() 
    {
        $total='0';
        $orders=OrderLine::all();
        foreach($orders as $order)
        {
            $total+=$order->quantity;
        }
        $this->demand=$total;
        return $total;
    }
    public function getHC(){
        $costs=Cost::all();
        $totalH='0';
        foreach($costs as $cost)
        {
            if($cost->category=="Holding Cost")
            $totalH+=$cost->amount;
        }

        $totalStock='0';
        $stocks=Stock::all();
        foreach($stocks as $stock)
        {
            $totalStock+=(int)$stock->quantity;
        }

        $hc=round($totalH/$totalStock/2,2);
        $this->hc=$hc;
        return $hc;
    }
    public function getOC(){
        $costs=Cost::all();
        $totalO='0';
        foreach($costs as $cost)
        {
            if($cost->category=="Ordering Cost")
            $totalO+=$cost->amount;
        }

        $now=Carbon::now()->format('Y');

        $stocknr=StockNr::all();
        $totalNr='0';
        foreach($stocknr as $nr)
        {
            if($now==$nr->year)
            {
                $totalNr+=$nr->number;
            }
        }
        $oc=round($totalO/$totalNr,2);
        $this->oc=$oc;
        return $oc;
    }
    public function setYear(){
        $now=Carbon::now()->format('Y');
        $this->year=$now;
    }

}
