<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success mt-5">Voltar</button>
        </a>
    </section>
    <h2 class="mt-3">Cadastrar vaga</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control">
        </div>
        <div class="form-group">
            <label for="descricao" class="form-label">Descricão</label>
            <textarea class="form-control" id="descricao" rows="5"></textarea>
        </div>
        <div class="form-group">
            <labe class="form-label">Status</labe>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="ativo" id="ativo" value="s" checked>
                <label class="form-check-label" for="ativo">
                    Ativo
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="ativo" id="inativo" value="n">
                <label class="form-check-label" for="inativo">
                    Inativo
                </label>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success mt-4">Enviar</button>
        </div>
    </form>
</main>