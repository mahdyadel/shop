 <div class="form-group {{ $errors->has('name')?'has-error'  : '' }}">
        {!! Form::label('name','name') !!}
        {!! Form::text('name',$product->name,['class'=>'form-control']) !!}
    
        <span class="text-danger">{{ $errors->has('name')? $errors->first('name') : '' }}</span>
     </div>

<div class="form-group {{$errors->has('price')? 'has-error' : ''}}">
        {!! Form::label('price','price') !!}
        {!! Form::text('price',$product->price,['class'=>'form-control']) !!}
   
        <span class="text-danger">{{$errors->has('price')? $errors->first('price') : ''}}</span>
     </div>
<div class="form-group {{$errors->has('description')? 'has-error' : ''}}">
        {!! Form::label('description','description')!!}
        {!! Form::textarea('description',$product->description,['class'=>'form-control']) !!}
   
            <span class="text-danger">{{$errors->has('description')? $errors->first('description') : ''}}</span>
     </div>
  
<div class="form-group {{$errors->has('image')? 'has-error' : ''}}">
   {!! Form::label('image','Image') !!}
   {!! Form::file('image',['class'=>'form-control' , 'id' => 'image']) !!}
   <div id="thumb-output"></div>

       <span class="text-danger">{{$errors->has('image')? $errors->first('image') : ''}}</span>
    </div>