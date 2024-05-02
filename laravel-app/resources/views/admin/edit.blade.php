<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p><a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
                        <x-primary-button>{{ __('Return') }}</x-primary-button>
                    </a></p>
                    <form method="post" action="{{ route('admin.update',$user->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div>
                                    <p class="text-sm mt-2 text-gray-800">
                                        {{ __('Your email address is unverified.') }}

                                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 font-medium text-sm text-green-600">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <div>
                            <x-input-label for="cep" :value="__('CEP')" />
                            <x-text-input id="cep" name="cep" type="text" class="mt-1 block w-full" :value="old('cep', $user->cep)" required autofocus autocomplete="cep" />
                            <x-input-error class="mt-2" :messages="$errors->get('cep')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'profile-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>

                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Address Information') }}
                </h2>

                <!-- JavaScript for fetching the address by CEP -->
                <script>
                    function limpa_formulário_cep() {
                        // Limpa valores do formulário de cep.
                        document.getElementById('rua').value = "";
                        document.getElementById('bairro').value = "";
                        document.getElementById('cidade').value = "";
                    }

                    function meu_callback(conteudo) {
                        if (!("erro" in conteudo)) {
                            // Atualiza os campos com os valores.
                            document.getElementById('rua').value = (conteudo.logradouro);
                            document.getElementById('bairro').value = (conteudo.bairro);
                            document.getElementById('cidade').value = (conteudo.localidade);
                        } else {
                            // CEP não Encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    }

                    function pesquisacep(valor) {
                        // Nova variável "cep" somente com dígitos.
                        var cep = valor.replace(/\D/g, '');

                        // Verifica se campo cep possui valor informado.
                        if (cep != "") {
                            // Expressão regular para validar o CEP.
                            var validacep = /^[0-9]{8}$/;

                            // Valida o formato do CEP.
                            if (validacep.test(cep)) {
                                // Preenche os campos com "..." enquanto consulta webservice.
                                document.getElementById('rua').value = "...";
                                document.getElementById('bairro').value = "...";
                                document.getElementById('cidade').value = "...";

                                // Cria um elemento javascript.
                                var script = document.createElement('script');

                                // Sincroniza com o callback.
                                script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                                // Insere script no documento e carrega o conteúdo.
                                document.body.appendChild(script);
                            } else {
                                // CEP é inválido.
                                limpa_formulário_cep();
                                alert("Formato de CEP inválido.");
                            }
                        } else {
                            // CEP sem valor, limpa formulário.
                            limpa_formulário_cep();
                        }
                    };
                </script>

                <form method="get" action=".">
                    <label>Cep:
                        <input name="cep" type="text" id="cep_consulta" value="{{$user->cep}}" size="10" maxlength="9" onblur="pesquisacep(this.value);" /></label><br />
                    <label>Rua:
                        <input name="rua" type="text" id="rua" size="60" /></label><br />
                    <label>Bairro:
                        <input name="bairro" type="text" id="bairro" size="40" /></label><br />
                    <label>Cidade:
                        <input name="cidade" type="text" id="cidade" size="40" /></label><br />
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
