{include file="header.tpl"}
<div class="container_card">
{foreach from=$dinos item=$dino}
    <div class="card mb-5" style="width: 18rem;">
            <img src="{$dino->Imagen}" class="card-img-top" alt="imagen_dino">
        <div class="card-body">
            <h5 class="card-title">{$dino->nombre_cientifico}</h5>
            <p class="card-text"></p>
        </div>
            <ul class="list-group list-group-flush">
                    <li class="list-group-item">Altura: {$dino->altura}cm</li>
                    <li class="list-group-item">Peso: {$dino->peso}kg</li>
                    <li class="list-group-item">Alimentacion: {$dino->alimentacion}</li>
                    <li class="list-group-item">vivio hace {$dino->anios_vivos} millones de años atras</li>
                {foreach from=$habitat item=$habi}
                    {if ({$dino->id_habitat_fk}==={$habi->id_habitat})}
                    <li class="list-group-item">habitat: {$habi->bioma}</li>
                    {/if}
                {/foreach}
            </ul>
        <div class="card-body">
            {if !isset($smarty.session.USER_ID)}
            <a href="vermas/{$dino->id_dinosaurio}" class="btn btn-info">Ver Mas</a>
            {else}
            <a href="vermas/{$dino->id_dinosaurio}" class="btn btn-info">Ver Mas</a>
            <a href='editardinos/{$dino->id_dinosaurio}' class="btn btn-warning">Editar</a>
            <a href='delete/{$dino->id_dinosaurio}' type='button' class='btn btn-danger'>Borrar</a>
            {/if}
        </div>
    </div>
{/foreach}
</div>
{include file="footer.tpl"}