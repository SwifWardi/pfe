<form wire:submit.prevent='login'>
    @if ($errorMessage)
        <div class="alert alert-danger">
            <p>{{ $errorMessage }}</p>
        </div>
    @endif
                                        
                                            <div class="form-group">
                                                <input type="email" required="" wire:model.defer="email" placeholder="Email" value="{{ old('email') }}"/>
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" wire:model.defer="password" placeholder="Your password *" />
                                            </div>
                                            
                                            <div class="login_footer form-group mb-50">
                                            <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" wire:model.defer="remember_me" id="exampleCheckbox1" value="">
                                                        <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                                    </div>
                                                </div>
                                                @if (Route::has('password.request'))
                                                    <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                                        {{ __('Forgot your password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Log in</button>
                                            </div>
                                        </form>