<form method="POST" action="{{ route('store.eoq') }}">
    @csrf
<div class="col-md-12">
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#eoq"> {{ __('Compute EOQ') }}</button>
    </div>
</form>
    <div class="modal" tabindex="-1" role="dialog" id="eoq">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><br/><h3> EOQ </h3>current
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    {{$eoq}}
                </div>

        </div>
    </div>
{{-- </form> --}}
    
    