<x-layout>
    <x-slot name="content">

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel class="bg-gray-100">
                <h1 class="text-center font-bold text-xl">Register!</h1>

                <form action="/register" method="post" class="mt-10">
                    @csrf
                    <x-form.input name="name"/>
                    <x-form.input name="username"/>
                    <x-form.input name="email" type="email" autocomplete="new-username"/>
                    <x-form.input name="password" type="password" autocomplete="new-password"/>
                    <x-form.button>Register Account</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>

    </x-slot>
</x-layout>
