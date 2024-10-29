@include('layouts.index')
@include('layouts.nav')

<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h1>Cadastro de usuário</h1>
        <br>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome')" />
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

            <x-text-input id="password" class="form-control" type="password" name="password" required
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
            <x-input-label for="nome" :value="__('CEP')" />
            <x-text-input id="cep" class="form-control" type="text" name="cep" required autofocus
                autocomplete="name" />
        </div>
        <div class="mt-4">
            <x-input-label for="nome" :value="__('Logradouro')" />
            <x-text-input id="logradouro" class="form-control" type="text" name="logradouro" required autofocus
                autocomplete="name" />
        </div>
        <div class="mt-4">
            <x-input-label for="nome" :value="__('Bairro')" />
            <x-text-input id="bairro" class="form-control" type="text" name="bairro" required autofocus
                autocomplete="name" />
        </div>
        <div class="mt-4">
            <x-input-label for="nome" :value="__('Cidade')" />
            <x-text-input id="cidade" class="form-control" type="text" name="cidade" required autofocus
                autocomplete="name" />
        </div>
        <div class="mt-4">
            <x-input-label for="nome" :value="__('Estado')" />
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

        <div class="flex items-center justify-center mt-4">
            <div class="gap-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Já cadastrado?') }}
                </a>
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('register.biblioteca') }}">
                    {{ __('É biblioteca?') }}
                </a>
            </div>
            <x-primary-button class="ms-4">
                {{ __('Cadastrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
<script>
    $("input[name=cep]").blur(function() {
        var cep = $(this).val().replace(/[^0-9]/, '');
        if (cep) {
            var url = 'https://viacep.com.br/ws/' + cep + '/json/';
            $.ajax({
                url: url,
                dataType: 'jsonp',
                crossDomain: true,
                contentType: "application/json",
                success: function(json) {
                    if (json.logradouro) {
                        $("input[name=logradouro]").val(json.logradouro);
                        $("input[name=bairro]").val(json.bairro);
                        $("input[name=cidade]").val(json.localidade);
                        $("input[name=estado]").val(json.uf);
                    }
                }
            });
        }
    });
</script>
<div style="margin-top: 1rem">
    @include('layouts.footer')
</div>
