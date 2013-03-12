<div class="row pagination-centered">
    <div><h3>DNF-Style Signup</h3></div>
</div>

<div class="container">
    <div class="row">
        <div class="span4 offset4">
            {{ Form::open(Config::get('myauth::config.bundle_route') . '/' . Config::get('myauth::config.signup_route'), 'POST', array('class' => 'well')) }}

                @if ($errors->has())
                    <div class="alert alert-error">
                        <a class="close" data-dismiss="alert" href="#">×</a>

                        <?php echo implode('<br>', $errors->all()); ?>
                    </div>
                @endif

                <div class="span4">

                    <!-- Username -->
                    <div class="control-group">
                        {{ Form::label('username', 'Username', array('class' => 'control-label')) }}
                        <div class="controls">
                            {{ Form::text('username', Input::old('username'), array('class' => 'span3')) }}
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="control-group">
                        {{ Form::label('email', 'Email', array('class' => 'control-label')) }}
                        <div class="controls">
                            {{ Form::text('email', Input::old('email'), array('class' => 'span3')) }}
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="control-group">
                        {{ Form::label('password', 'Password', array('class' => 'control-label')) }}
                        <div class="controls">
                            {{ Form::password('password', array('class' => 'span3')) }}
                        </div>
                    </div>

                    <!-- Password confirmation -->
                    <div class="control-group">
                        {{ Form::label('password_confirmation', 'Password confirmation', array('class' => 'control-label')) }}
                        <div class="controls">
                            {{ Form::password('password_confirmation', array('class' => 'span3')) }}
                        </div>
                    </div>

                </div>

                <div>
                    {{ Form::button('Signup', array('class'=>'btn btn-inverse')) }}
                </div>

            {{ Form::token(), Form::close() }}

        </div>
    </div>
</div>