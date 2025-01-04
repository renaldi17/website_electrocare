@extends('layout')

@section('content')
<div class="container mt-4">
    <h1>Daftar Transaksi</h1>

    <div class="row">
        
        @foreach ($orders as $order)
            @csrf
            <div class="card mb-3">
                <div class="pt-3">
                <h5 class="pt-4" style="display: inline;">{{$order->created_at}}</h5>
                @if($order->status =='order')   
                <span class="badge bg-warning" style="display: inline; margin-left: 10px;">
                    {{  $order->status }}
                </span>
                @elseif($order->status =='paid')
                <span class="badge bg-success" style="display: inline; margin-left: 10px;">
                    {{  $order->status }}
                </span>
                @else
                <span class="badge bg-danger" style="display: inline; margin-left: 10px;">
                    {{  $order->status }}
                </span>
                @endif
            </div>
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h3>Invoice no : </h3>
                        <p>{{ $order->snapToken}}</p>
                    </div>
                    <div>
                        <h4>Total Belanja</h4>
                        <strong>Rp. {{$order->total}}</strong>
                    </div>
                    @if (($order->status =='order'))
                    <button id="pay-button-{{ $order->id }}" class="btn btn-primary border-radius">
                        Pay Now
                    </button>
                    @elseif(($order->status =='paid'))
                        <button class="btn btn-primary border-radius">Success</button>  
                    @else
                        <button class="btn btn-primary border-radius">Order Again</button>
                    @endif
                    
                </div>
            </div>
            <script type="text/javascript">
                document.getElementById('pay-button-<?=$order->id ?>').onclick = function(){
                snap.pay('<?=$order->snapToken?>', {
                    // Optional
                    onSuccess: function(result){
                        fetch('/checkout/success/<?=$order->id ?>', {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json',
                            }
                        }).then(response => response.json()).then(data => {
                                console.log('Backend Response:', data);
                                location.reload();
                                location.href = location.href + '?nocache=' + new Date().getTime(); 
                                alert('payment order with invoice <?=$order->snapToken ?> success');
                            })
                            .catch(error => {
                                console.error('Error sending payment result to backend:', error);
                                location.reload();
                                location.href = location.href + '?nocache=' + new Date().getTime();
                            });
                    },
                    // Optional
                    onPending: function(result){
                        console.log(result)
                    },
                    // Optional
                    onError: function(result){
                        fetch('/checkout/failed/<?=$order->id ?>', {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json',
                            }
                        }).then(response => response.json()).then(data => {
                                console.log('Backend Response:', data);
                                location.reload();
                                location.href = location.href + '?nocache=' + new Date().getTime(); 
                                alert('payment failed with invoice <?=$order->snapToken ?>');
                                alert('you must reorder items');
                            })
                            .catch(error => {
                                console.error('Error sending payment result to backend:', error);
                                location.reload();
                                location.href = location.href + '?nocache=' + new Date().getTime();
                            });
                            snap.hide();
                    }
                });
                };
            </script>
        @endforeach

        
    </div>
</div>

<style>
    .card {
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        border-radius: 8px;
        border: none;
    }

    h1 {
        margin-bottom: 30px;
    }

    h3 {
        margin: 0;
    }

    h4 {
        margin: 0;
    }

    .badge {
        font-size: 0.9rem;
    }
</style>
@endsection
