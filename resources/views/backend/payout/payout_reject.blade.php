@extends('layouts.backend')
@push('title')
<title>Payout Reject | Gaibandhasell.com</title>
@endpush
@section('content')

    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Payout Rejection</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="mt-3">
                            <label class="form-label">Requested Amount</label>
                            <input style="width: 150px" type="test" disabled class="form-control" value="5000/=">
                        </div>

                        <div class="mt-3">
                            <label class="form-label" for="reason">Reject Reason</label>
                            <textarea name="reason" class="form-control"  id="reason" cols="10" rows="5"></textarea>
                        </div>

                        <div class="mt-5">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
