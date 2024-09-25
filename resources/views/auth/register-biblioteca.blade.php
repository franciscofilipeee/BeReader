@include('layouts.index')
@include('layouts.nav')

<x-guest-layout>
    <form method="POST" action="{{ route('store.biblioteca') }}">
        @csrf
        <!-- Name -->
        <input type="hidden" name="user_type_id" value="2">
        <div>
            <x-input-label for="name" :value="__('Nome do usuário')" />
            <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirme sua senha')" />

            <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <br>
        <hr>
        <div class="mt-4">
            <x-input-label for="biblioteca_nome" :value="__('Nome da biblioteca/Escola')" />
            <x-text-input id="biblioteca_name" class="form-control" type="text" name="biblioteca_name" required
                autofocus autocomplete="name" />
        </div>
        <div class="mt-4">
            <x-input-label for="biblioteca_nome" :value="__('Logradouro')" />
            <x-text-input id="biblioteca_logradouro" class="form-control" type="text" name="biblioteca_logradouro"
                required autofocus autocomplete="name" />
        </div>
        <div class="mt-4">
            <x-input-label for="biblioteca_nome" :value="__('Bairro')" />
            <x-text-input id="biblioteca_bairro" class="form-control" type="text" name="biblioteca_bairro" required
                autofocus autocomplete="name" />
        </div>
        <div class="mt-4">
            <x-input-label for="biblioteca_nome" :value="__('Cidade')" />
            <x-text-input id="biblioteca_cidade" class="form-control" type="text" name="biblioteca_cidade" required
                autofocus autocomplete="name" />
        </div>
        <div class="mt-4">
            <x-input-label for="biblioteca_nome" :value="__('CEP')" />
            <x-text-input id="cep" class="form-control" type="text" name="cep" required autofocus
                autocomplete="name" />
        </div>
        <div class="mt-4">
            <x-input-label for="biblioteca_nome" :value="__('Estado')" />
            <select id="estado" class="form-control" name="estado">
                <option value="" selected disabled hidden>Estado</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
            </select>
        </div>
        <div class="mt-4">
            <x-input-label for="is_escola" :value="__('É uma escola?')" />
            <select id="select" class="form-control" name="escola">
                <option value="0">Não sou uma escola</option>
                <option value="1">Sou uma escola</option>
            </select>
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Já cadastrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Cadastrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
@include('layouts.footer')
