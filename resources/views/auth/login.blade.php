<x-layout>

    <div class="d-flex  justify-content-center">
        <div class="card m-4 p-2 bg-opacity-75" style="width: 40rem;">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @error('failed')
                        <div id="nameHelp" class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="text" class="form-control" name="email" value={{ old('email') }}>
                        @error('email')
                            <div id="nameHelp" class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                            <div id="nameHelp" class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>



                    <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
                </form>
            </div>
        </div>
    </div>


</x-layout>
