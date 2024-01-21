<div>
            <div class="form-group">
                <label for="exampleInputEmail1">{{$label}}</label>
                <input type="{{$type}}" name="{{$name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$value}}">
                <!-- <small id="emailHelp" class="form-text text-muted">We'llnever share your email with anyone else.</small>  -->
                <span class="text-danger">
                    @error($name)
                        {{$message}}
                    @enderror
                </span>
            </div>
</div>