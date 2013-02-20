
<div class="row pagination-centered">
<!--    <div class="span5"></div>-->
    <div><h3>Aanvraag fotoshoot</h3></div>
</div>

<div class="container">
    <div class="row">
        <div class="offset1 span10">

            {{ Form::open('/', 'POST', array('class' => 'well')) }}

                <div class="row">

                    @if($errors->has())
                        <div id="error"><?php echo implode('<br>', $errors->all()); ?></div>
                    @endif

                    <div class="span4">

                        <!-- Honorific -->
                        <div class="control-group">
                            <label class="control-label">Aanhef</label>
                             <div class="controls">
                                {{ Form::radio('honorific[]', 'ms', 'true', array('id'=>'ms', 'class'=>'honorific')) }}
                                {{ Form::label('ms', 'Mevrouw', array('class' => 'radio inline')) }}
                            </div>
                            <div class="controls">
                               {{ Form::radio('honorific[]', 'mr', '', array('id'=>'mr', 'class'=>'honorific')) }}
                               {{ Form::label('mr', 'Meneer', array('class' => 'radio inline')) }}
                           </div>
                        </div>

                        <!-- First name -->
                        <div class="control-group">
                            {{ Form::label('first_name', 'Voornaam', array('class' => 'control-label')) }}
                            <div class="controls">
                                {{ Form::text('first_name', Input::old('first_name'), array('class' => 'span4')) }}
                            </div>
                        </div>

                        <!-- Last name -->
                        <div class="control-group">
                            {{ Form::label('last_name', 'Achternaam', array('class' => 'control-label')) }}
                            <div class="controls">
                                {{ Form::text('last_name', Input::old('last_name'), array('class' => 'span4')) }}
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="control-group">
                            {{ Form::label('email', 'Email', array('class' => 'control-label')) }}
                            <div class="controls">
                                {{ Form::text('email', Input::old('email'), array('class' => 'span4')) }}
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="control-group">
                            {{ Form::label('phone', 'Telefoon', array('class' => 'control-label')) }}
                            <div class="controls">
                                {{ Form::text('phone', Input::old('phone'), array('class' => 'span4')) }}
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="control-group">
                            {{ Form::label('address', 'Adres', array('class' => 'control-label')) }}
                            <div class="controls">
                                {{ Form::text('address', Input::old('address'), array('class' => 'span4')) }}
                            </div>
                        </div>

                        <!-- House number-->
                        <div class="control-group">
                            {{ Form::label('house_number', 'Huisnummer', array('class' => 'control-label')) }}
                            <div class="controls">
                                {{ Form::text('house_number', Input::old('house_number'), array('class' => 'span1')) }}
                            </div>
                        </div>

                        <!-- City -->
                        <div class="control-group">
                            {{ Form::label('city', 'Plaats', array('class' => 'control-label')) }}
                            <div class="controls">
                                {{ Form::text('city', Input::old('city'), array('class' => 'span4')) }}
                            </div>
                        </div>

                        <!-- Country -->
                        <div class="control-group">
                            {{ Form::label('country', 'Land', array('class' => 'control-label')) }}
                            <div class="controls">
                                {{ Form::select('country', array('nl' => 'Nederland', 'be' => 'Belgie', 'de' => 'Duitsland'), 'nl', array('class' => 'span4')) }}
                            </div>
                        </div>

                    </div>

                    <div class="span5 requestRemarkSpan">

                        <!-- Remark -->
                        <div class="control-group">
                            {{ Form::label('remark', 'Toelichting', array('class' => 'control-label')) }}

                            <div class="requestRemark">
                                Heb je zelf al ideeën van wat je leuk zou vinden, hoe je graag op de foto wilt of andere
                                suggesties, dan kun je dat hier aangeven. Ook vragen en opmerkingen kun je hier kwijt.
                            </div>
                            <div class="controls">
                                {{ Form::textarea('remark', Input::old('remark'), array('class' => 'span5')) }}
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row buttonDiv">
                    {{ Form::button('Versturen', array('class'=>'btn btn-inverse')) }}
                </div>

            {{ Form::token(), Form::close() }}

        </div>

    </div>
</div>


