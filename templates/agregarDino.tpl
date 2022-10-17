{include file="header.tpl"}

<h1>AGREGA TU DINOSAURIO</h1>

<form action='adddino' method='POST' enctype="multipart/form-data">
<div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Nombre Cientifico</label>
    <div class="col-sm-10">
        <input required type="Text" class="form-control" name="nombre_dino">
    </div>
</div>
<div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Altura</label>
    <div class="col-sm-10">
        <input required type="Number" class="form-control" name="altura_dino">
    </div>
</div>
<div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Peso</label>
    <div class="col-sm-10">
        <input required type="Number" class="form-control" name="peso_dino">
    </div>
</div>
<div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Alimentacion</label>
    <div class="col-sm-10">
        <input required type="Text" class="form-control" name="alimentacion_dino">
    </div>
</div>
<div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Años vivo</label>
    <div class="col-sm-10">
        <input required type="Number" class="form-control" name="anos_vivos">
    </div>
</div>
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">descripcion</label>
    <textarea required class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion"></textarea>
</div>
<div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Habitat</label>
    <select name='habitat' class="form-select" aria-label="Default select example">
        {foreach from=$habitat item=$habi}
            <option name='habitat' value="{$habi->id_habitat}">{$habi->bioma}</option>
        {/foreach}
    </select>
</div>
        <input required type="file" name="imagen">
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

{include file="footer.tpl"}