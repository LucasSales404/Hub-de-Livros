@include('components.alert')

<!DOCTYPE html>
<html lang="pt-br">
{{--  --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body class="bg-slate-900 relative">
    <header class="w-full h-[80px] bg-slate-950 flex items-center">
        <div class="nome-site">
            <h1 class="text-2xl">Teste</h1>
        </div>
    </header>
    <main>
        <section class="relative text-white px-26 py-16 flex flex-col gap-10">
            <div class="title w-full h-[50px] flex items-center justify-between ">
                <h1 class="text-2xl font-medium">Meus Livros </h1>
                <div id="addLivro" class="cursor-pointer bg-red-600 w-[200px] h-[35px] gap-[3px] font-medium rounded-sm flex justify-center items-center">
                    <img class="max-w-[20px]" src="{{ asset('/images/adicionar.png') }}" alt="">
                    <p>Adicionar novo</p>
                </div>
            </div>
            <div class="livros flex flex-wrap gap-8">
                @foreach ($livros as $livro)
                    <div class="card-livro gap-2 w-[200px] h-[400px] flex flex-col" id="livro-{{ $livro->id }}" >
                        <div class="imagem border-[2px] w-full h-[250px]">
                            <img class="w-full h-full"
                                src="{{ asset($livro->capa ? 'storage/' . $livro->capa : '/images/livro.png') }}"
                                alt="">
                        </div>
                        <div class="titulo w-full h-[50px] flex justify-center items-center">
                            <p id="livro-titulo-{{ $livro->id }}" class="text-white font-medium">{{ $livro->titulo }}</p>
                        </div>
                        <div class=" flex justify-between gap-2 w-full h-[50px] font-medium">
                            <a href="{{ asset('storage/' . $livro->arquivo) }}" target="_blank">
                                <div
                                    class="bg-red-600 w-[90px] h-[40px] rounded-[2px] cursor-pointer flex justify-center items-center gap-[3px]">
                                    <img class="max-w-[20px]" src="{{ asset('/images/icon-olho.png') }}" alt="">
                                    <p>Ler</p>
                                </div>
                            </a>

                            <div data-id="{{ $livro->id }}" data-titulo="{{ $livro->titulo }}" data-arquivo="{{ $livro->arquivo }}"
                                class="editar  bg-slate-700 w-[50px] h-[40px] rounded-sm cursor-pointer flex justify-center items-center gap-[3px]">
                                <img class="max-w-[20px]" src="{{ asset('/images/icon-editar.png') }}" alt="">
                            </div>
                            <div data-id="{{ $livro->id }}"
                                class="deletar  bg-slate-700 w-[50px] h-[40px] rounded-sm cursor-pointer flex justify-center items-center gap-[3px]">
                                <img class="max-w-[20px]" src="{{ asset('/images/icon-lixo.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div id="campoForm"
                class="hidden w-screen h-[600px] flex justify-center items-center absolute left-[0px] right-[0px] top-[0px] bottom-[0px]">
                <div
                    class=" pt-5 relative form bg-slate-950 w-[500px] h-[350px] rounded flex flex-col justify-center gap-3">
                    <button id="closeForm"
                        class="cursor-pointer right-[35px] top-[20px] text-white font-medium text-lg absolute">X</button>
                    <div class="header-form  flex justify-center">
                        <h2 class="text-white font-medium text-lg">Adicionar Livro</h2>
                    </div>
                    <form action="" id="formLivro"
                        class="w-[500px] h-[250px] text-white flex flex-col gap-4 justify-center items-center ">
                        @csrf
                        <div class="input-content w-[400px] flex flex-col gap-3">
                            <label for="titulo">Titulo</label>
                            <input
                                style="background-image: url('{{ asset('/images/icon-livro.png') }}'); background-size: 20px;"
                                class=" bg-[10px_center] bg-no-repeat rounded-sm w-[400px] h-[40px] bg-slate-900 px-8"
                                name="titulo" type="text" placeholder="Insira o titulo" id="inputTitulo">
                        </div>
                        <div class="input-content w-[400px] flex flex-col">
                            <input type="file" name="capa" id="inputCapa" class="hidden arquivo">
                            <div class="flex gap-1 items-center">
                                <img class="w-[15px] h-[15px]" src="{{ asset('/images/icon-upload.png') }}"
                                    alt="">
                                <label for="inputCapa" class="nomeArquivo cursor-pointer text-[15px]">Selecione a
                                    capa</label>
                                <div class="removerArquivo  hidden cursor-pointer font-medium">X</div>
                            </div>
                        </div>
                        <div class="input-content w-[400px] flex flex-col">
                            <input type="file" name="arquivo" id="inputArquivo" class="hidden arquivo">
                            <div class="flex gap-1 items-center">
                                <img class="w-[15px] h-[15px]" src="{{ asset('/images/icon-upload.png') }}"
                                    alt="">
                                <label for="inputArquivo" class="nomeArquivo cursor-pointer text-[15px]">Selecione o
                                    arquivo</label>
                                <div class="removerArquivo  hidden cursor-pointer font-medium">X</div>
                            </div>
                        </div>
                        <button id="salvarLivro" data-modo="cadastrar" class="w-[400px] rounded-sm cursor-pointer h-[35px] bg-red-600"
                            type="submit">Salvar</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    
    @vite('resources/js/cadastrarLivro.js')
    @vite('resources/js/atualizarLivro.js')
    @vite('resources/js/deletarLivro.js')
</body>

</html>
