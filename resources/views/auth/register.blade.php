<x-layout>

    <div class="d-flex  justify-content-center">
        <div class="card m-4 p-2 bg-opacity-75" style="width: 40rem;">
            <div class="card-body">
                <form method="post" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control ring-danger" name="name"  value="{{old('name')}}">
                        @error('name')
                            <div id="nameHelp" class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="text" class="form-control" name="email" value="{{old('email')}}">
                        @error('email')
                            <div id="nameHelp" class="text-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                            <div id="nameHelp" class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                        @error('password')
                            <div id="nameHelp" class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary w-100 py-2">Register</button>

                </form>
            </div>
        </div>
    </div>


</x-layout>
