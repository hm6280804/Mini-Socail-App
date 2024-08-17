
 @extends('layouts.master')

 @section('contents')

    <main class="pt-5 mt-5">
        <div class="container mt-4">
            <h1 class="text-center mb-4">Login Yourself</h1>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('login.process') }}" method="POST">
                        @csrf

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

                       @if (session('fails'))
                            <p class="invalid-feedback">{{ session('failed') }}</p>                          
                       @endif
                        <button type="submit" class="my-2 btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    @endsection

   
