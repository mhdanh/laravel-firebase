@extends('layout')
@section('content')
    <a id="btn-login" style="display: none;" href="{{url('/login')}}">login</a>
    <a id="btn-logout" style="display: none;" href="{{url('/login')}}">logout</a>

    <button id="btnDonateCompany">Donate company</button>

    <button id="btnGetDonateCompany">Get donates</button>

    <div><input id="email" /><button id="btnGetByEmail">get by email</button></div>

    <div><input id="uuid" /><button id="btnGetByUUID">get by uuid</button></div>
@stop
