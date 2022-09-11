<x-guest-layout>
    <x-jet-validation-errors class="mb-4" />
    <form class="form-stl" action="{{ route('register') }}" name="frm-login" method="POST" >
        @csrf
        <div class="col-12 col-md-6">
            <div class="login_form mb-50">
                <h5 class="mb-3">Register</h5>

                <div class="form-group">
                    <input type="text" id="frm-reg-lname" name="full_name" class="form-control" placeholder="First name*" :value="full_name" required autofocus autocomplete="full_name">
                </div>
                <div class="form-group">
                    <input type="email" id="frm-reg-email" name="email" class="form-control" placeholder="Email address" :value="email" required>
                </div>
                <div class="form-group">
                    <input type="text" id="frm-reg-pass" class="form-control" name="password"  placeholder="Password" required autocomplete="new-password">
                </div>
                <div class="form-group">
                    <input type="text" id="frm-reg-cfpass" name="password_confirmation" class="form-control" placeholder="Confirm Password" required autocomplete="new-password">
                </div>
                <button type="submit" value="Register" name="register" class="btn btn-primary btn-sm" >Register</button>

            </div>
        </div>
    </form>
</x-guest-layout>
