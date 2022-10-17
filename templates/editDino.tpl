{include file="header.tpl"}

<h1>EDITAR DINOSAURIO</h1>
<form action='editdino/{$dinos->id_dinosaurio}' method='POST'>
<div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Nombre Cientifico</label>
    <div class="col-sm-10">
        <input type="Text" class="form-control" name="nombre_dino" value="{$dinos->nombre_cientifico}">
    </div>
</div>
<div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Altura</label>
    <div class="col-sm-10">
        <input type="Number" class="form-control" name="altura_dino" value="{$dinos->altura}">
    </div>
</div>
<div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Peso</label>
    <div class="col-sm-10">
        <input type="Number" class="form-control" name="peso_dino" value="{$dinos->peso}">
    </div>
</div>
<div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Alimentacion</label>
    <div class="col-sm-10">
        <input type="Text" class="form-control" name="alimentacion_dino" value="{$dinos->alimentacion}">
    </div>
</div>
<div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Años vivo</label>
    <div class="col-sm-10">
        <input type="Number" class="form-control" name="anos_vivos" value="{$dinos->anios_vivos}">
    </div>
</div>
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">descripcion</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion">{$dinos->descripcion}</textarea>
</div>
<div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Habitat</label>
    <select name='habitat' class="form-select" aria-label="Default select example" placeholder="{$dinos->id_habitat_fk}">
            <option selected value="{$habitatDino->id_habitat}">{$habitatDino->bioma}</option>
            {foreach from=$habitat item=$habi}
                {if ({$habi->bioma} === {$dinos->id_habitat_fk})}
                    <option selected value="{$habitatDino->id_habitat}">{$habitatDino->bioma}</option>
                    <h1>aa</h1>
                {else}
                    <option name='habitat' value="{$habi->id_habitat}">{$habi->bioma}</option>
                {/if}
            {/foreach}
    </select>
</div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>

{include file="footer.tpl"}