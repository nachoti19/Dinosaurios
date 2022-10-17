{include file="header.tpl"}
    <ul class="list-group">
        <li class="list-group-item active" aria-current="true">LISTA DE LOS DINOSAURIOS SEGUN EL CONTINENTE</li>
        {foreach from=$habitat item=$habi}
        <li class="list-group-item">{$habi->nombre_cientifico}</li>
        {/foreach}
    </ul>
{include file="footer.tpl"}