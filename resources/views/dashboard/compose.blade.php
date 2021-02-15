@extends('layouts.app')

@section('content')


    @include('dashboard.top_nav')

    @include('dashboard.side-nav')


    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <br>



                <div id="layoutCompose">
                    <div id="layoutCompose_content">
                        <main>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                                            <div class="card-header"><h3 tabindex="1" class="text-center font-weight-light my-4">Available Contacts:</h3></div>
                                            <div class="card-body">
                                                <ol class="list-group">
                                                    @forelse($contacts as $contact)
                                                        <li class="list-group-item">
                                                            <a class="contactEmail text-black" tabindex="1" href="{{ route('compose.contact', $contact->id) }}">{{ $contact->email }}@vmail.com</a>
                                                        </li>
                                                    @empty
                                                    @endforelse
                                                </ol>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                                            <div class="card-header"><h3 tabindex="1" class="text-center font-weight-light my-4">Send Email</h3></div>
                                            <div class="card-body">
                                                <form method="POST" action="{{ route('compose') }}">
                                                    @csrf

                                                    <div class="form-group"><label class="small mb-1" for="inputEmailAddress">From: </label>
                                                        <div class="d-flex align-items-center">
                                                        <input name="fromEmail" class="form-control py-4" id=""
                                                               type="text" aria-describedby="emailHelp" placeholder="Enter email"
                                                        value="{{ auth()->user()->email }}" readonly/>
                                                        <span>{{ env('vmail') }}</span>
                                                        </div>

                                                    </div>

                                                    <div class="form-group"><label class="small mb-1" for="emailTo">To: </label>
                                                        <div class="d-flex align-items-center">
                                                            <input name="to" class="form-control py-4" id="emailTo"
                                                                   value="{{ $selected_contact ? $selected_contact->email : '' }}" {{ $selected_contact ? 'readonly' : '' }}
                                                                   type="text" aria-describedby="emailHelp" placeholder="Enter email" tabindex="{{ $selected_contact ? -999 : 1 }}" />
                                                            <span>{{ env('vmail') }}</span>
                                                        </div>

                                                    </div>

                                                    <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Subject: </label>
                                                        <input name="subject" class="form-control py-4" id="emailSubject"
                                                               type="text" aria-describedby="emailHelp" placeholder="Enter subject" tabindex="1"/></div>

                                                    <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Body: </label>
                                                        <textarea  class="form-control py-4" name="body" id="emailBody" cols="" rows="" tabindex="1"></textarea></div>

                                                    <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block" tabindex="1">Send</button></div>
                                                </form>
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





    </div>

@endsection




