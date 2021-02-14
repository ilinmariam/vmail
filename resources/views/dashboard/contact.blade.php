@extends('layouts.app')

@section('content')


    @include('dashboard.top_nav')

    @include('dashboard.side-nav')


    <div id="layoutContactPage">
        <main>
            <div class="container-fluid">
                <br>

                <div id="layoutContact">
                    <div id="layoutContact_content">
                        <main>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                                            <div class="card-header"><h3 tabindex="1" class="text-center font-weight-light my-4">Create Contact</h3></div>
                                            <div class="card-body">
                                                <form method="POST" action="{{ route('contact') }}">
                                                    @csrf

                                                    <div class="form-group"><label class="small mb-1" for="emailTo">Email: </label>
                                                        <div class="flex" style="align-items: center">
                                                        <input name="email" class="form-control py-4 mr-2"
                                                               type="text" aria-describedby="emailHelp" placeholder="Enter email username" tabindex="1" />
                                                        <span>@vmail.com</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block text-black-50" tabindex="4">Create Contact</button></div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                                            <div class="card-header"><h3 tabindex="1" class="text-center font-weight-light my-4">Available Contacts:</h3></div>
                                            <div class="card-body">
                                                <ol class="list-group">
                                                    @forelse($contacts as $contact)
                                                    <li class="list-group-item justify-content-between" style="display: flex">
                                                        <span class="contactEmail" tabindex="1">{{ $loop->index+1 }}. {{ $contact->email }}@vmail.com</span>
                                                        <a tabindex="1" class="btn btn-danger" href="{{ route('contact.destroy', $contact->id) }}">Delete</a>
                                                    </li>
                                                    @empty
                                                    @endforelse
                                                </ol>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </main>
                    </div>

                </div>

            </div>


        </main>

    </div>




@endsection




