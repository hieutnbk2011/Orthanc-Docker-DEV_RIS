<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('A logged in user has submitted a web inquiry.  The message is shown below.') }}
        </div>

        <div class="mb-4 text-sm text-gray-600">
            <?php print_r($postdata); ?>

        </div>

    </x-jet-authentication-card>
</x-guest-layout>
        <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

Array ( [_token] => JjpBtq3FlRV3fOwBEZHhkfydfGLq3RCe9ciYEOcJ [name] => [email] => [phone] => [subject] => [message] => )
