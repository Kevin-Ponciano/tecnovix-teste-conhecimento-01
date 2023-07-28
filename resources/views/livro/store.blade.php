<x-app>
    <div class="page-body">
        <div class="container-narrow">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cadastrar Livro</h3>
                </div>
                <x-post-livro :action="route('store')"/>
            </div>
        </div>
    </div>
</x-app>
