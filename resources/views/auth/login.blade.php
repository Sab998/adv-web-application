<style type="text/css">
    a {
        color: blue;
        font-size: 20px;
        background-color: #2d3748;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>

                <x-jet-input id="email" class="block mt-1 w-full" type="email" placeholder="Email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">

                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
            </div>



            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('No account? Register') }}
                </a>


                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>

        <div class="flex justify-between items-center mt-3">
           <hr class="w-full"> <span class="p-2 text-gray-400 mb-1">OR</span>
            <hr class="w-full">
        </div>

        <div style="margin-left: 55px;">
        <div class="hover:bg-gray-300 border fa fa-github"  style="background-color: #4a5568; text-align: center; color: #e5edff; padding: 5px; margin-top: 5px;" >
        <a background-color: #2d3748 href="{{route('github.redirect')}}"  >Github</a>
        </div>
        <div class=" fa fa-google hover:bg-gray-300 border"  style="background-color: #f05252; text-align: center; color: #e5edff; padding: 5px; margin-top: 5px;" >
            <a background-color: #2d3748 href=""  >Google</a>
        </div>
        <div class="fa fa-facebook  hover:bg-gray-300 border"  style="background-color: #5145cd; text-align: center; color: #e5edff; padding: 5px; margin-top: 5px;" >
            <a background-color: #2d3748 href=""  >Facebook</a>
        </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
