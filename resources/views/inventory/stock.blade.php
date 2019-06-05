<div class="control">
        <button type="submit" class="btn btn-outline-success"data-toggle="modal" data-target="#stock{{$loop->index}}"> {{ __('Update Quantity') }}</button>
    </div>
    <form method="POST" action="/products/stock/{{ $product->id }}"> 
        @method('PATCH')
        @csrf

    <div class="modal" tabindex="-1" role="dialog" id="stock{{$loop->index}}">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title"><br/><h3>New Stock </h3> received
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <input class="typeahead form-control" name="quantity" placeholder="New Quantity" style="auto;width:150px;" type="text">
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success">COMPLETE</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>

        </form>
    </div>

<!-- STOCK NUMBER -->
<div class="modal" tabindex="-1" role="dialog" id="order">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><br/><h3>Stock Orders Number </h3><br/>History
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <th>Orders #</th>
                        <th>Year</th>
                    </thead>
                    <tbody>
                        @foreach($numbers as $nr)
                        <tr>
                            <td>{{$nr->number}}</td>
                           <td>{{$nr->year}}</td>  
                        </tr> 
                        @endforeach                   
                </table>
            </div>
            <div class="modal-footer">
                    <form method="POST" action="/products/order_nr"> 
                        @csrf
                        <button type="submit" class="btn btn-success">Add new stock order</button>
                    </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>



