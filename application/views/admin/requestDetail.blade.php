
<div class="row pagination-centered">
    <div class="formHeader span9">
	    <h3>Aanvraag detail gegevens

		    <div class="crudMenu class="btn-group" id="{{ $request->id }}">
			    <a class="btn requestEdit" href="#"><i class="icon-edit"></i></a>
			    <a class="btn requests" href="#"><i class="icon-list"></i></a>
		    </div>
	    </h3>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="span9 detailPage">

	        {{ Form::open('/', 'POST', array('class' => 'well form-horizontal')) }}

                <div class="row">

                    <div class="span8">

	                    <!-- Customer number -->
                        <div class="control-group">
                            <label class="control-label">Klantnummer</label>
                            <div class="controls">
                                {{ $request->customer->customer_number }}
                            </div>
                        </div>

	                    <!-- Vouchernumber -->
                        <div class="control-group">
                            <label class="control-label">Vouchernummer</label>
                            <div class="controls">
                                {{ $request->voucher_number }}
                            </div>
                        </div>

	                    <!-- Request date -->
                        <div class="control-group">
                            <label class="control-label">Aanvraag datum</label>
                            <div class="controls">
                                {{ date('d-m-Y', strtotime($request->created_at)) }}
                            </div>
                        </div>

                        <!-- Honorific -->
                        <div class="control-group">
                            <label class="control-label">Aanhef</label>
                             <div class="controls">
	                             {{ $request->customer->honorific }}
                            </div>
                        </div>

                        <!-- First name -->
                        <div class="control-group">
                            {{ Form::label('first_name', 'Voornaam', array('class' => 'control-label')) }}
                            <div class="controls">
	                            {{ $request->customer->first_name }}
                            </div>
                        </div>

                        <!-- Last name -->
                        <div class="control-group">
                            {{ Form::label('last_name', 'Achternaam', array('class' => 'control-label')) }}
                            <div class="controls">
	                            {{ $request->customer->last_name }}
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="control-group">
                            {{ Form::label('email', 'Email', array('class' => 'control-label')) }}
                            <div class="controls">
	                            {{ $request->customer->email }}
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="control-group">
                            {{ Form::label('phone', 'Telefoon', array('class' => 'control-label')) }}
                            <div class="controls">
	                            {{ $request->customer->phone }}
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="control-group">
                            {{ Form::label('address', 'Adres', array('class' => 'control-label')) }}
                            <div class="controls">
	                            {{ $request->customer->address }}
                            </div>
                        </div>

                        <!-- House number-->
                        <div class="control-group">
                            {{ Form::label('house_number', 'Huisnummer', array('class' => 'control-label')) }}
                            <div class="controls">
	                            {{ $request->customer->house_number }}
                            </div>
                        </div>

                        <!-- City -->
                        <div class="control-group">
                            {{ Form::label('city', 'Plaats', array('class' => 'control-label')) }}
                            <div class="controls">
	                            {{ $request->customer->city }}
                            </div>
                        </div>

                        <!-- Country -->
                        <div class="control-group">
                            {{ Form::label('country', 'Land', array('class' => 'control-label')) }}
                            <div class="controls">
	                            {{ $request->customer->country }}
                            </div>
                        </div>

                        <!-- Remark -->
                        <div class="control-group">
                            {{ Form::label('remark', 'Toelichting', array('class' => 'control-label')) }}

                            <div class="controls">
	                            {{ $request->customer_remarks }}
                            </div>
                        </div>

                    </div>


                </div>

	        {{ Form::token(), Form::close() }}

        </div>

    </div>
</div>


