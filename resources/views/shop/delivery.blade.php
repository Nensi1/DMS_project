<div class="control">
        <button type="submit" class="btn btn-outline-primary"data-toggle="modal" data-target="#detail{{$loop->index}}" data-whatever="@mdo"> Comment</button>
    </div>
    {{-- <div class="modal" tabindex="-1" role="dialog" id="test">
        <div class="modal-dialog" role="document"> --}}
                <div id="detail{{$loop->index}}" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="detail{{$loop->index}}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Detail # <br/><h3>{{$detail->id}}</h3><b></b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                            <th>Delivery Agent</th>
                            <th>Time Taken</th>
                            <th>Comment</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$detail->user->name}}</td>
                                <td>{{$detail->timetaken}}</td>
                               <td>{{$detail->comment}}</td>  
                            </tr> 
                    </table>
                </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
    
        </div>
    </div> 