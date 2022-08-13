@extends('layouts.main')
@section('content')

    <div class="col-12 col-xl-12 mt-4 mb-xl-0">
        <div class="card redial-border-light redial-shadow">
            <div class="card-body">
                <h6 class="header-title pl-3 redial-relative">Contacts</h6>
                <div class="custom-tabs2">
                    <ul class="nav nav-tabs flex-column flex-md-row nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link redial-light rounded-0 active" data-toggle="tab" href="#id1" role="tab"
                               aria-selected="false" aria-expanded="true"><i
                                    class="icofont icofont-address-book pr-2"></i> Public</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link redial-light rounded-0" data-toggle="tab" href="#id2" role="tab"
                               aria-selected="true" aria-expanded="false"><i class="icofont icofont-favourite pr-2"></i>
                                Favorite</a>
                        </li>
                    </ul>
                    <div class="tab-content border redial-border-light" id="myTabContent">
                        <div class="tab-pane fade active show" id="id1" role="tabpanel" aria-expanded="false">
                            <div class="card-body">
                                <table
                                    class="table table-hover mb-0 redial-font-weight-500 table-responsive d-md-table">
                                    <thead class="redial-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Comment</th>
                                        <th scope="col">Created Date</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$contact->full_name}}</td>
                                            <td>{{$contact->email}}</td>
                                            <td>{{$contact->phone}}</td>
                                            <td>{{$contact->comment}}</td>
                                            <td>{{$contact->created_at}}</td>
                                            <td>
                                                <a
                                                    class="btn btn-primary"
                                                    href="{{route('add_to_favourite',['contact' => $contact->id])}}">Add to Favorite</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="id2" role="tabpanel" aria-expanded="true">
                            <div class="card-body">
                                <table
                                    class="table table-hover mb-0 redial-font-weight-500 table-responsive d-md-table">
                                    <thead class="redial-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Comment</th>
                                        <th scope="col">Created Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($favourite_contacts as $contact)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$contact->full_name}}</td>
                                            <td>{{$contact->email}}</td>
                                            <td>{{$contact->phone}}</td>
                                            <td>{{$contact->comment}}</td>
                                            <td>{{$contact->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
