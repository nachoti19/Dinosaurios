{include file="header.tpl"}

    {if $error} 
        <div class="alert alert-danger mt-3">
            {$error}
        </div>
    {/if} 

<ul class="list-group">
    {foreach from=$habitat item=habi}
    <li class="list-group-item">Continente: {$habi->continente} ||  Bioma: {$habi->bioma} || Temperatura: {$habi->temperatura}°c mayor a la actual 
    {if !isset($smarty.session.USER_ID)}
    <a href='listadinos/{$habi->id_habitat}' type='button' class='btn btn-info'>Lista Dinosaurios</a>
    {else}
    <a href='listadinos/{$habi->id_habitat}' type='button' class='btn btn-info'>Lista Dinosaurios</a>
    <a href='deletehab/{$habi->id_habitat}' type='button' class='btn btn-danger'>Borrar</a>
    <a href='editarhabitat/{$habi->id_habitat}' type='button' class='btn btn-warning'>Editar</a>
    </li>
    {/if}
    {/foreach}
</ul>

{include file="footer.tpl"}