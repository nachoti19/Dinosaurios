{include file="header.tpl"}

<h1>AGREGAR HABITAT</h1>

<form action='addhabitat' method='POST'>
<div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Continente</label>
    <div class="col-sm-10">
        <input required type="Text" class="form-control" name="continente">
    </div>
</div>
<div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Bioma</label>
    <div class="col-sm-10">
        <input required type="Text" class="form-control" name="bioma">
    </div>
</div>
<div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Temperatura</label>
    <div class="col-sm-10">
        <input required type="Number" class="form-control" name="temperatura">
    </div>
</div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

{include file="footer.tpl"}