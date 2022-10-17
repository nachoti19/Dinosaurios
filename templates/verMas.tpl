{include file="header.tpl"}
<h1>{$dinos->nombre_cientifico}</h1>
<div><img src="{$dinos->Imagen}" class="imagen_lista"></div>

<ul class="list-group list-group-flush">    
    <li class="list-group-item">Altura: {$dinos->altura}cm</li>
    <li class="list-group-item">Peso: {$dinos->peso}kg</li>
    <li class="list-group-item">Alimentacion: {$dinos->alimentacion}</li>
    <li class="list-group-item">vivio hace {$dinos->anios_vivos} millones de años atras</li>
    <li class="list-group-item">Continente: {$habitat->continente}</li>
    <li class="list-group-item">Bioma: {$habitat->bioma}</li>
    <li class="list-group-item">Temperatura: {$habitat->temperatura}°c mas que en la actualidad</li>
</ul>
<div class="descripcion mb-5">
{$dinos->descripcion}</div>
{include file="footer.tpl"}