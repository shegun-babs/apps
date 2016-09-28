@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default animated bounce">
                    <div class="panel-heading"><strong>Unsubscribe</strong></div>

                    <div class="panel-body">
                        <h4>Unsubscribe from Jabisod Newsletter</h4>
                        <div href="#!" class="btn btn-info mt-10">You have been Unsubscribed</div>

                        <p class="mt-20">
                            You will stop receiving newletters from Jabisod Agencies.
                        </p>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('head')
<meta http-equiv="refresh" content="5;URL='http://jabisodagencies.com/'" /> 
@endsection