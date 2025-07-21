<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body class="bg-slate-900">
    <header class="w-screen h-[80px] bg-slate-950 flex items-center">
        <div class="nome-site">
            <h1 class="text-2xl">Teste</h1>
        </div>
    </header>
    <main>
        <section class="relative text-white p-6 flex flex-col gap-10">
            <div class="title w-[1/2] h-[50px] flex items-center justify-between border-4 border-white">
                <h1 class="text-2xl font-medium">Meus Livros </h1>
                <button id="addLivro" class="cursor-pointer bg-red-600 w-[200px] h-[35px] font-medium rounded-sm">Adicionar novo</button>
            </div>
            <div class="livros">
                <div class="card-livro border-4 border-white gap-2 w-[400px] h-[450px] flex flex-col items-center">
                    <div class="imagem border-4 border-red-600 w-[300px] h-[320px]">

                    </div>
                    <div class="titulo w-[300px] h-[50px] flex justify-center items-center">
                        <p class="text-white font-medium">Titulo Livro</p>
                    </div>
                    <div class=" flex justify-between gap-2 w-[300px] h-[50px] font-medium">
                        <button class="bg-red-600 w-[150px] h-[40px] rounded-[2px]">Ler</button>
                        <button class="bg-slate-700 w-[150px] h-[40px] rounded-sm">Deletar</button>
                    </div>
                </div>
            </div>
            <div id="campoForm"
                class="hidden w-screen h-[600px] flex justify-center items-center absolute left-[0px] right-[0px] top-[0px] bottom-[0px]">
                <div
                    class=" pt-5 relative form bg-slate-950 w-[500px] h-[300px] rounded flex flex-col justify-center gap-3">
                    <button id="closeForm"
                        class="cursor-pointer right-[35px] top-[20px] text-white font-medium text-lg absolute">X</button>
                    <div class="header-form  flex justify-center">
                        <h2 class="text-white font-medium text-lg">Adicionar Livro</h2>
                    </div>
                    <form action=""
                        class="w-[500px] h-[200px] text-white flex flex-col gap-4 justify-center items-center ">
                        <div class="input-content w-[400px] flex flex-col gap-3">
                            <label for="titulo">Titulo</label>
                            <input
                                style="background-image: url('{{ asset('/images/icon-livro.png') }}'); background-size: 20px;"
                                class=" bg-[10px_center] bg-no-repeat rounded-sm w-[400px] h-[40px] bg-slate-900 px-8"
                                name="titulo" type="text" placeholder="Insira o titulo">
                        </div>
                        <div class="input-content w-[400px] flex flex-col">
                            <input type="file" name="arquivo" id="arquivo" class="hidden">
                            <div class="flex gap-1 items-center">
                                <img class="w-[15px] h-[15px]" src="{{ asset('/images/icon-upload.png') }}"
                                    alt="">
                                <label id="nomeArquivo" for="arquivo" class="cursor-pointer text-[15px]">Selecione o arquivo</label>
                                <div id="removerArquivo" class="hidden cursor-pointer font-medium">X</div>
                            </div>
                        </div>
                        <button class="w-[400px] rounded-sm cursor-pointer h-[35px] bg-red-600"
                            type="submit">Salvar</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    @vite('resources/js/cadastrarLivro.js')
</body>

</html>
