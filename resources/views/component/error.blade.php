@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<?php 

// function getInvalidClassname($id)
// {
//     if(@error('id')) {}
//     return "@error('id') is-invalid @enderror";
// }