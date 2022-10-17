{include file="header.tpl"}

<form method="POST" action="validate">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
</div>
{if $error} 
    <div class="alert alert-danger mt-3">
        {$error}
    </div>
{/if}
<button type="submit" class="btn btn-primary">Submit</button>
</form>

{include file="footer.tpl"}