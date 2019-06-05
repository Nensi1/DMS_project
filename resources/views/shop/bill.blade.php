<div class="control">
    <button type="submit" class="btn btn-primary"data-toggle="modal" data-target="#test{{$loop->index}}" data-whatever="@mdo"> BILL</button>
</div>
{{-- <div class="modal" tabindex="-1" role="dialog" id="test">
    <div class="modal-dialog" role="document"> --}}
            <div id="test{{$loop->index}}" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="testLabel{{$loop->index}}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Bill # <br/><h3>{{$order->id}}</h3><b></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body" >
                <div class="container-fluid" style=" margin-bottom:50px; margin-top:10px; auto;[B]padding:100px 0;[/B]">

                    <div class="row">
                        <div class="col-sm-12">
                                <b>Nr Serial</b>
                                <h4>_______________</h4>
                            </div>
                        <div class="col-sm-8">
                            <b>Nipt</b>
                            <h4><u>{{$order->client->nipt}}</u></h4>
                        </div>
                        <div class="col-sm-4 text-right">
                            <b>Date</b>
                            <h5><u>{{$order->created_at->toDateString()}}</u></h5>
                        </div>
                        </div>
                </div>

            <div class="form-group">
                    <div class="table-responsive">
                <table class="table table-condensed table-striped table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Barkodi</th>
                            <th scope="col">Emri</th>
                            <th scope="col">Njesia e matjes</th>
                            <th scope="col">Sasi</th>
                            <th scope="col">Cmimi per njesi pa TVSH</th>
                            <th scope="col">Vlefta pa TVSH</th>
                            <th scope="col">Vlefta e TVSH</th>
                            <th scope="col">Vlefta me TVSH</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderlines as $orderline)
                            @if($orderline->order_id==$order->id)
                            @foreach($products as $product)
                            @if($product->id==$orderline->product_id)
                            <tr>
                            <th scope="row">{{$loop->iteration }}</th>
                            <td>{{$product->barcode}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->unit}}</td>
                            <td>{{$orderline->quantity}}</td>
                            <td>{{$product->sell_price/1.2}}</td>
                            <td>{{$product->sell_price/1.2*$orderline->quantity}}</td>
                            <td>{{$product->sell_price*$orderline->quantity-$product->sell_price/1.2*$orderline->quantity}}</td>
                            <td>{{$product->sell_price*$orderline->quantity}}</td>
                            </tr>
                            @endif
                            @endforeach
                            @endif
                            @endforeach 
                        <tr>
                                                                                                
                            <td colspan="5"></td>
                            <td>
                                <strong>Totali pa zbritje</strong>
                            </td>
                            <td class="right">{{$order->total/1.2}}</td>
                            <td class="right">{{$order->total-$order->total/1.2}}</td>
                            <td class="right">{{$order->total}}</td>

                        </tr> 
                        
                        <tr>
                            
                            
                            <td colspan="5"></td>
                            <td>
                                <strong>Zbritje</strong>
                            </td>
                            <td class="right">{{$order->discount}}</td>
                            <td class="right">{{$order->discount}}</td>
                            <td class="right">{{$order->discount}}</td>
                        </tr> 
                        <tr>
                            
                            <td colspan="5"></td>
                            <td>
                                <strong>TOTALI</strong>
                            </td>
                            <td class="right">{{$order->total/1.2+$order->discount}}</td>
                            <td class="right">{{$order->total-$order->total/1.2+$order->discount}}</td>
                            <td class="right">{{$order->total+$order->discount}}</td>

                        </tr> 
                        <tr>
                            <td colspan="5"></td>
                            <td>
                                <strong>Nga te cilat: Furnizime te tatueshme</strong>
                            </td>
                            <td class="right">{{$order->total/1.2+$order->discount}}</td>
                            <td colspan="2"></td>   
                        </tr> 
                        <tr>
                            <td colspan="5"></td>
                            <td>
                                <strong>Furnizime te patatueshme</strong>
                            </td>
                            <td class="right"></td>
                            <td colspan="2"></td>   
                        </tr> 

                    </tbody>
                </table>
                <div class="container-fluid" style=" margin-top:70px; margin-bottom:30px; auto;[B]padding:100px 0;[/B]">

                <div class="row">
                    <div class="col-sm-4">
                        <b>Bleresi</b><br/>
                        <i>(Emer,Mbiemer,firme)</i>
                    </div>
                    <div class="col-sm-4">
                        <b>Transportuesi</b><br/>
                        <i>(Emer,Mbiemer,firme)</i>
                    </div>
                    <div class="col-sm-4">
                        <b>Shitesi</b><br/>
                        <i>(Emer,Mbiemer,firme)</i>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            Perdorimi i kesaj fature eshte lejuar nga Drejtoria e Pergjithshme e Tatimeve me Shkresen Nr__________ date _________
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

    </div>
</div> 