<x-guest-layout>
    <div class="card">
        <div class="header">
            <p class="lead">Register to your account</p>
        </div>
        <div class="body">
            <x-jet-validation-errors class="mb-4" />
            <form name="frm-login" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="First Name">First Name:<span class="text-danger">*</span></label>
                    <input type="text" id="frm-reg-lname" name="full_name" class="form-control" placeholder="First name*" :value="full_name" required autofocus autocomplete="full_name">
                </div>
                <div class="form-group">
                    <label for="Email">Email:<span class="text-danger">*</span></label>
                    <input type="email" id="frm-reg-email" name="email" class="form-control" placeholder="Email address" :value="email" required>
                </div>
                <div class="form-group">
                    <label for="Password">Password:<span class="text-danger">*</span></label>
                    <input type="text" id="frm-reg-pass" class="form-control" name="password"  placeholder="Password" required autocomplete="new-password">
                </div>
                <div class="form-group">
                    <label for="Confirm Password">Confirm Password:<span class="text-danger">*</span></label>
                    <input type="text" id="frm-reg-cfpass" name="password_confirmation" class="form-control" placeholder="Confirm Password" required autocomplete="new-password">
                </div>
                <button type="submit" class="btn btn-primary btn-sm" value="Login" name="submit">>Register</button>
            </form>
        </div>
</x-guest-layout>
