{{-- <x-layout>
    <style>
        body {
            padding-top: 90px; /* Adjust this to match your header's height */
        }

        .main {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            width: 100%;
            padding: 20px; /* Optional: Adds some padding inside the main container */
        }

        .input {
            margin-bottom: 15px;
            width: 100%;
            max-width: 300px;
            text-align: left;
        }

        .input label {
            display: block;
            margin-bottom: 5px;
            font-size: 16px;
        }

        .input input {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .btn {
            padding: 10px 20px;
            background-color: palevioletred;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: blueviolet;
        }
    </style>

    <h1>Register yourself</h1>
    <div class="main">
        <form action="" method="POST">
            <div class="input">
                <label for="username">Username</label>
                <input type="text" name="username">
            </div>

            <div class="input">
                <label for="email">Email</label>
                <input type="email" name="email">
            </div>

            <div class="input">
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>

            <div class="input">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation">
            </div>

            <button type="submit" class="btn">Register</button>
        </form>
    </div>
</x-layout>
 --}}

@extends('layouts.master')

 @section('contents')

    <main class="pt-5 mt-5">
        <div class="container mt-4">
            <h1 class="text-center mb-4">Register Yourself</h1>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('register.process') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
                            @error('username')
                                 <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                 <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password')
                            <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>

                        <button type="submit" class="my-2 btn btn-primary w-100">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    @endsection

   
