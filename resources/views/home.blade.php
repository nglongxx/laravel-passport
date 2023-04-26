@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Here are a list of your clients:</p>
                    @foreach($clients as $client)
                        <div class="py-3 text-gray-900">
                            <h3 class="text-lg text-gray-500">{{ $client->name }}</h3>
                            <p><b>Client ID:</b>{{ $client->id }}</p>
                            <p><b>Client Redirect: </b>{{ $client->redirect  }}</p>
                            <p><b>Client Secret: </b>{{ $client->secret }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="mt-3 p-6 bg-white border-b border-gray-200">
                    <form action="/oauth/clients" method="POST">
                        <div>
                            <label for="name">Name</label>
                            <input type="text" name="name" placeholder="Client Name">
                        </div>
                        <div class="mt-2">
                            <label for="redirect">Redirect</label>
                            <input type="text" name="redirect" placeholder="https://my-url.com/callback">
                        </div>
                        <div class="mt-3">
                            @csrf
                            <button type="submit">Create Client</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    // axios.get('/oauth/clients')
    // .then(response => {
    //     console.log(response.data);
    // });

    const data = {
    name: 'test',
    redirect: 'http://laravel-app.test/callback'
};

axios.post('/oauth/clients', data)
    .then(response => {
        console.log(response.data);
    })
    .catch (response => {
        // List errors on response...
    });
</script>

@endpush
