<div class="form-group">
    {!! Form::label('name', 'Nome:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Categoria:', ['class' => 'control-label']) !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('price', 'Preço:', ['class' => 'control-label']) !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Descrição:', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <div class="checkbox">
        <label>
            {!! Form::checkbox('featured', 1, false) !!} Produto em destaque
        </label>
    </div>

    <div class="checkbox">
        <label>
            {!! Form::checkbox('recommend', 1, false) !!} Produto recomendado
        </label>
    </div>
</div>