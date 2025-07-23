<div class="campo-alerta fixed inset-0 flex justify-center items-center z-40 hidden">
    <div class="overlay absolute inset-0 bg-black/30 backdrop-blur-[1px]"></div>

    <div
        class="card-alerta text-white bg-slate-950 w-[400px] h-[170px] p-4 flex flex-col justify-between relative z-50 rounded">
        <div class="header-card">
            <div class="titiulo-card flex gap-[3px] items-center">
                <img class="max-w-[20px] max-h-[20px]" src="{{ asset('/images/icon-alerta.png') }}" alt="">
                <h3>Alerta</h3>
            </div>
        </div>
        <div class="conteudo p-4 flex justify-center items-center">
            <p>Lorem ipsum dolor sit amet consectetur adipi elit. Atque quibusdam</p>
        </div>
        <div class="botao-card flex items-center justify-center">
            <button id="botaoOk"
                class="bg-red-600 w-[80px] h-[30px] rounded-[2px] cursor-pointer hover:bg-slate-400">Ok</button>
        </div>
    </div>
</div>

@vite('resources/js/alerta.js')
