
<div class="row pagination-centered">
<!--    <div class="span5"></div>-->
    <div class="formHeader span9">
	    <h3>Bewerken Aanvraag

		    <div class="crudMenu class="btn-group" id="{{ $request->id }}">
			    <a class="btn requestDetail" href="#"><i class="icon-search"></i></a>
			    <a class="btn requests" href="#"><i class="icon-list"></i></a>
		    </div>
	    </h3>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="span9">

            {{ Form::open('/editRequest/' . $request->id, 'POST', array('class' => 'well')) }}

                <div class="row">

                    @if($errors->has())
                        <div id="error"><?php echo implode('<br>', $errors->all()); ?></div>
                    @endif

                    <div class="span3">

	                    <!-- Customer number -->
                     <div class="control-group">
                         {{ Form::label('customer_number', 'Klantnummer', array('class' => 'control-label')) }}
                         <div class="controls">
                             {{ Form::text('customer_number', $request->customer->customer_number, array('class' => 'span3')) }}
                         </div>
                     </div>

	                    <!-- Voucher number -->
                     <div class="control-group">
                         {{ Form::label('voucher_number', 'Vouchernummer', array('class' => 'control-label')) }}
                         <div class="controls">
                             {{ Form::text('voucher_number', $request->voucher_number, array('class' => 'span3')) }}
                         </div>
                     </div>

                        <!-- Honorific -->
                        <div class="control-group">
                            <label class="control-label">Aanhef</label>
                             <div class="controls">
                                {{ Form::radio('honorific[]', 'ms', ('ms' == $request->customer->honorific), array('id'=>'ms', 'class'=>'honorific')) }}
                                {{ Form::label('ms', 'Mevrouw', array('class' => 'radio inline')) }}
                            </div>
                            <div class="controls">
                               {{ Form::radio('honorific[]', 'mr', ('mr' == $request->customer->honorific), array('id'=>'mr', 'class'=>'honorific')) }}
                               {{ Form::label('mr', 'Meneer', array('class' => 'radio inline')) }}
                           </div>
                        </div>

                        <!-- First name -->
                        <div class="control-group">
                            {{ Form::label('first_name', 'Voornaam', array('class' => 'control-label')) }}
                            <div class="controls">
                                {{ Form::text('first_name', $request->customer->first_name, array('class' => 'span3')) }}
                            </div>
                        </div>

                        <!-- Last name -->
                        <div class="control-group">
                            {{ Form::label('last_name', 'Achternaam', array('class' => 'control-label')) }}
                            <div class="controls">
                                {{ Form::text('last_name', $request->customer->last_name, array('class' => 'span3')) }}
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="control-group">
                            {{ Form::label('email', 'Email', array('class' => 'control-label')) }}
                            <div class="controls">
                                {{ Form::text('email', $request->customer->email, array('class' => 'span3')) }}
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="control-group">
                            {{ Form::label('phone', 'Telefoon', array('class' => 'control-label')) }}
                            <div class="controls">
                                {{ Form::text('phone', $request->customer->phone, array('class' => 'span3')) }}
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="control-group">
                            {{ Form::label('address', 'Adres', array('class' => 'control-label')) }}
                            <div class="controls">
                                {{ Form::text('address', $request->customer->address, array('class' => 'span3')) }}
                            </div>
                        </div>

                        <!-- House number-->
                        <div class="control-group">
                            {{ Form::label('house_number', 'Huisnummer', array('class' => 'control-label')) }}
                            <div class="controls">
                                {{ Form::text('house_number', $request->customer->house_number, array('class' => 'span1')) }}
                            </div>
                        </div>

                        <!-- City -->
                        <div class="control-group">
                            {{ Form::label('city', 'Plaats', array('class' => 'control-label')) }}
                            <div class="controls">
                                {{ Form::text('city', $request->customer->city, array('class' => 'span3')) }}
                            </div>
                        </div>

                        <!-- Country -->
                        <div class="control-group">
                            {{ Form::label('country', 'Land', array('class' => 'control-label')) }}
                            <div class="controls">
                                {{ Form::select('country', array('nl' => 'Nederland', 'be' => 'Belgie', 'de' => 'Duitsland'), 'nl', array('class' => 'span3')) }}
                            </div>
                        </div>

                    </div>

                    <div class="span3 requestRemarkSpan">

                        <!-- Remark -->
                        <div class="control-group">
                            {{ Form::label('remark', 'Klant opmerking', array('class' => 'control-label')) }}

                            <div class="controls">
                                {{ Form::textarea('remark', $request->customer_remarks, array('class' => 'span5')) }}
                            </div>
                        </div>

                    </div>


	                <div class="span3 requestRemarkSpan">

                     <!-- Remark -->
                     <div class="control-group">
                         {{ Form::label('remark', 'DNF opmerking', array('class' => 'control-label')) }}

                         <div class="controls">
                             {{ Form::textarea('remark', $request->dnf_remarks, array('class' => 'span5')) }}
                         </div>
                     </div>

                 </div>

                </div>

                <div class="row buttonDiv">
                    {{ Form::button('Opslaan', array('class'=>'btn btn-inverse')) }}
                </div>

            {{ Form::token(), Form::close() }}

        </div>

    </div>
</div>


