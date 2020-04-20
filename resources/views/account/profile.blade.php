@php
    $title = "Profile";
    $css = "profile.css";
@endphp
@extends('layouts.master')
@section('content')
    <main>
        <h1>Personal Information</h1>
        <form method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="firstName">
               <label for="firstName">First Name:</label> <br> <input type="text" name="firstname" id="firstname" placeholder="John" value="{{$user->firstname}}" required>
            </div>
            <div class="lastName">
                <label for="lastName"> Last Name:</label>

               <br> <input type="text" name="lastname" id="lastname" placeholder="Doe" value="{{$user->lastname}}" required>
            </div>
            <div class="email">
                <label for="email">Email:</label><br> <input type="text" name="email" id="email" placeholder="test@test.com" value="{{$user->email}}" required>
                
            </div>
            <div class="phoneNumber">
                <label for="phoneNumber">Phone Number:</label><br> <input type="text" name="phoneNumber" id="phoneNumber" placeholder="123-456-7890" value="{{$user->phoneNumber}}" required>
                
            </div>
            <div class="city">
                <label for="city">City:</label><br> <input type="text" name="city" id="city" placeholder="City" value="{{$user->city}}" required>
                
            </div>
            <div class="state">
                
               <label for="state"> State:</label><br> <input type="text" name="state" id="state" placeholder="Ontario" value="{{$user->state}}" required>
            </div>
            <div class="country">
                <label for="country">Country:</label><br> <input type="text" name="country" id="country" placeholder="Canada" value="{{$user->country}}" required>

            </div>
            <div class="role" style="background-color: #EAEAEA;">
                @if ($user->isAdmin == 1)
                    <label for="role">Role:</label><br> <input type="text" name="role" style="background-color: #EAEAEA;" id="role" value="Admin" readonly>
                @else
                    <label for="role">Role:</label><br> <input type="text" name="role" style="background-color: #EAEAEA;" id="role" value="User" readonly>
                @endif
            </div>
            <button type="submit">Done</button>
        </form>
    </main>
@endsection