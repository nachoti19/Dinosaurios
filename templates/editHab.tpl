{include file="header.tpl"}

<h1>EDITAR HABITAT</h1>

<form action='edithabitat/{$habitat->id_habitat}' method='POST'>
<div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Continente</label>
    <div class="col-sm-10">
        <input type="Text" class="form-control" name="continente" value="{$habitat->continente}">
    </div>
</div>
<div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Bioma</label>
    <div class="col-sm-10">
        <input type="Text" class="form-control" name="bioma" value="{$habitat->bioma}">
    </div>
</div>
<div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Temperatura</label>
    <div class="col-sm-10">
        <input type="Number" class="form-control" name="temperatura" value="{$habitat->temperatura}">
    </div>
</div>
    <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
</form>

{include file="footer.tpl"}